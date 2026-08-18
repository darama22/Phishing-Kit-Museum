#!/usr/bin/env python3
"""
Phishing Kit Museum — servidor local.

Sirve el catálogo de kits desmontados, sus anotaciones y una vista previa
segura del código (siempre kits "defang-eados": sin backend funcional,
sin datos de víctimas — ver RULES.md). No hay formularios reales que envíen
nada a ningún sitio: todo lo servido aquí es para leer y estudiar.
"""
import json
import shutil
import socket
import subprocess
import time
from pathlib import Path

import markdown
from flask import Flask, abort, jsonify, render_template, request, send_from_directory

APP_DIR = Path(__file__).resolve().parent
REPO_ROOT = APP_DIR.parent
KITS_DIR = REPO_ROOT / "kits"
INDEX_PATH = APP_DIR / "data" / "kits_index.json"

app = Flask(__name__)

# Procesos `php -S` que ha lanzado ESTA app, por carpeta de kit. Solo para
# poder pararlos luego con el botón "Detener" — nunca se guarda nada aquí
# que salga de tu propia máquina.
RUNNING = {}  # folder -> [subprocess.Popen, ...]


def port_is_open(host, port, timeout=0.3):
    try:
        with socket.create_connection((host, port), timeout=timeout):
            return True
    except OSError:
        return False


def wait_for_port(host, port, tries=20, delay=0.15):
    for _ in range(tries):
        if port_is_open(host, port):
            return True
        time.sleep(delay)
    return False


def launch_php_server(doc_root: Path, port: int):
    """Arranca `php -S 127.0.0.1:port` con doc_root como raíz, en segundo
    plano. Solo escucha en localhost — nunca accesible desde fuera de tu
    máquina."""
    return subprocess.Popen(
        ["php", "-S", f"127.0.0.1:{port}"],
        cwd=str(doc_root),
        stdout=subprocess.DEVNULL,
        stderr=subprocess.DEVNULL,
        start_new_session=True,
    )


def load_index():
    if not INDEX_PATH.exists():
        return {"total": 0, "kits": []}
    return json.loads(INDEX_PATH.read_text(encoding="utf-8"))


def resolve_kit_path(folder, rel_path):
    """Resuelve una ruta dentro de kits/<folder>/ validando que no se escape."""
    kit_root = (KITS_DIR / folder).resolve()
    target = (kit_root / rel_path).resolve()
    try:
        target.relative_to(kit_root)
    except ValueError:
        abort(403)
    if not target.exists() or not target.is_file():
        abort(404)
    return target


@app.route("/")
def index():
    return render_template("index.html")


def localize(kit, lang):
    """Aplica los campos _en cuando lang=en, con fallback a español si falta traducción."""
    kit = dict(kit)
    if lang == "en":
        for field in ("display_name", "target_brand", "kit_type", "delivery_vector", "notes"):
            kit[field] = kit.get(f"{field}_en") or kit[field]
        kit["evasion_techniques"] = kit.get("evasion_techniques_en") or kit["evasion_techniques"]
    return kit


@app.route("/api/kits")
def api_kits():
    lang = "en" if request.args.get("lang") == "en" else "es"
    data = load_index()
    data = dict(data)
    data["kits"] = [localize(k, lang) for k in data["kits"]]
    return jsonify(data)


@app.route("/api/kits/<folder>")
def api_kit_detail(folder):
    lang = "en" if request.args.get("lang") == "en" else "es"
    data = load_index()
    kit = next((k for k in data["kits"] if k["folder"] == folder), None)
    if not kit:
        abort(404)
    kit = localize(kit, lang)

    ann_key = "annotations_en_path" if (lang == "en" and kit.get("annotations_en_path")) else "annotations_path"
    ann_path = REPO_ROOT / kit[ann_key]
    annotations_html = ""
    used_fallback = ann_key == "annotations_path" and lang == "en"
    if ann_path.exists():
        annotations_html = markdown.markdown(
            ann_path.read_text(encoding="utf-8"), extensions=["fenced_code", "tables"]
        )
    kit["annotations_html"] = annotations_html
    kit["annotations_language_fallback"] = used_fallback
    return jsonify(kit)


@app.route("/api/kits/<folder>/source/<path:rel_path>")
def api_kit_source(folder, rel_path):
    """Devuelve el contenido de un archivo del kit como texto plano, para
    mostrarlo en el visor de código — nunca se ejecuta, solo se lee."""
    target = resolve_kit_path(folder, "original/" + rel_path)
    return jsonify({"path": rel_path, "content": target.read_text(encoding="utf-8", errors="replace")})


@app.route("/api/kits/<folder>/status")
def api_kit_status(folder):
    kit = _find_kit(folder)
    if not kit:
        abort(404)
    running = bool(kit.get("local_port")) and port_is_open("127.0.0.1", kit["local_port"])
    return jsonify({"running": running, "port": kit.get("local_port")})


@app.route("/api/kits/<folder>/launch", methods=["POST"])
def api_kit_launch(folder):
    kit = _find_kit(folder)
    if not kit:
        abort(404)
    if not kit.get("local_port"):
        return jsonify({"ok": False, "error": "Esta sala no tiene puerto local configurado."}), 400
    if not shutil.which("php"):
        return jsonify({"ok": False, "error": "No se encontró 'php' en tu sistema. Instálalo (p. ej. sudo apt install php-cli) y vuelve a intentarlo."}), 500

    original_dir = (KITS_DIR / folder / "original").resolve()
    if not original_dir.exists():
        return jsonify({"ok": False, "error": "Esta sala no tiene carpeta original/ para servir."}), 400

    port = kit["local_port"]
    procs = RUNNING.setdefault(folder, [])

    # Caso especial: salas con "upstream" propio (p. ej. W3LL/AiTM) necesitan
    # un segundo `php -S` local antes del principal.
    if kit.get("upstream_port") and not port_is_open("127.0.0.1", kit["upstream_port"]):
        procs.append(launch_php_server(original_dir, kit["upstream_port"]))
        if not wait_for_port("127.0.0.1", kit["upstream_port"]):
            return jsonify({"ok": False, "error": "No se pudo arrancar el servidor 'upstream' local."}), 500

    if not port_is_open("127.0.0.1", port):
        procs.append(launch_php_server(original_dir, port))
        if not wait_for_port("127.0.0.1", port):
            return jsonify({"ok": False, "error": f"No se pudo arrancar php -S en el puerto {port}."}), 500

    entry = kit.get("entry_path", "index.html")
    return jsonify({"ok": True, "url": f"http://127.0.0.1:{port}/{entry}", "port": port})


@app.route("/api/kits/<folder>/stop", methods=["POST"])
def api_kit_stop(folder):
    procs = RUNNING.pop(folder, [])
    for p in procs:
        try:
            p.terminate()
        except Exception:
            pass
    return jsonify({"ok": True, "stopped": len(procs)})


def _find_kit(folder):
    data = load_index()
    return next((k for k in data["kits"] if k["folder"] == folder), None)


@app.route("/preview/<folder>/<path:rel_path>")
def preview_static(folder, rel_path):
    """Vista previa visual de la 'máscara' HTML/CSS dentro de un iframe
    aislado en el propio museo — útil para ver el clon sin salir de la app."""
    kit_root = (KITS_DIR / folder / "original").resolve()
    target = resolve_kit_path(folder, "original/" + rel_path)
    return send_from_directory(kit_root, target.relative_to(kit_root).as_posix())


if __name__ == "__main__":
    print("Phishing Kit Museum -> http://127.0.0.1:5058")
    app.run(host="127.0.0.1", port=5058, debug=False)
