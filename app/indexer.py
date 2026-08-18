#!/usr/bin/env python3
"""
Indexador del Phishing Kit Museum.

Escanea kits/ buscando carpetas con meta.json + annotations.md + original/,
y genera app/data/kits_index.json. No modifica ni valida el contenido de
los kits: eso lo hace quien los añade, siguiendo RULES.md (cero datos de
víctimas, siempre defang-eados) ANTES de que lleguen aquí.
"""
import json
from pathlib import Path

APP_DIR = Path(__file__).resolve().parent
REPO_ROOT = APP_DIR.parent
KITS_DIR = REPO_ROOT / "kits"
OUTPUT_PATH = APP_DIR / "data" / "kits_index.json"

REQUIRED_FILES = ["meta.json", "annotations.md"]


def scan_kits():
    kits = []
    if not KITS_DIR.exists():
        return kits
    for kit_dir in sorted(p for p in KITS_DIR.iterdir() if p.is_dir()):
        meta_path = kit_dir / "meta.json"
        annotations_path = kit_dir / "annotations.md"
        annotations_en_path = kit_dir / "annotations_en.md"
        if not meta_path.exists() or not annotations_path.exists():
            print(f"  omitido (incompleto): {kit_dir.name}")
            continue
        try:
            meta = json.loads(meta_path.read_text(encoding="utf-8"))
        except json.JSONDecodeError as e:
            print(f"  ERROR meta.json inválido en {kit_dir.name}: {e}")
            continue

        original_dir = kit_dir / "original"
        files = []
        if original_dir.exists():
            for f in sorted(original_dir.rglob("*")):
                if f.is_file():
                    files.append(str(f.relative_to(kit_dir)))

        has_en = annotations_en_path.exists()
        kits.append({
            "id": meta.get("id", kit_dir.name),
            "folder": kit_dir.name,
            "display_name": meta.get("display_name", kit_dir.name),
            "display_name_en": meta.get("display_name_en", meta.get("display_name", kit_dir.name)),
            "target_brand": meta.get("target_brand", "?"),
            "target_brand_en": meta.get("target_brand_en", meta.get("target_brand", "?")),
            "year": meta.get("year"),
            "kit_type": meta.get("kit_type", "?"),
            "kit_type_en": meta.get("kit_type_en", meta.get("kit_type", "?")),
            "delivery_vector": meta.get("delivery_vector", "?"),
            "delivery_vector_en": meta.get("delivery_vector_en", meta.get("delivery_vector", "?")),
            "evasion_techniques": meta.get("evasion_techniques", []),
            "evasion_techniques_en": meta.get("evasion_techniques_en", meta.get("evasion_techniques", [])),
            "local_port": meta.get("local_port"),
            "entry_path": meta.get("entry_path", "index.html"),
            "upstream_port": meta.get("upstream_port"),
            "upstream_entry": meta.get("upstream_entry"),
            "status": meta.get("status", "unknown"),
            "source": meta.get("source", "?"),
            "notes": meta.get("notes", ""),
            "notes_en": meta.get("notes_en", meta.get("notes", "")),
            "files": files,
            "annotations_path": str(annotations_path.relative_to(REPO_ROOT)),
            "annotations_en_path": str(annotations_en_path.relative_to(REPO_ROOT)) if has_en else None,
        })
        if not has_en:
            print(f"      (sin annotations_en.md todavía — {kit_dir.name})")
        print(f"  OK  {kit_dir.name}  ({len(files)} archivos)")
    return kits


def main():
    print("Escaneando kits/ ...")
    kits = scan_kits()
    non_defanged = [k for k in kits if k["status"] != "defanged"]
    if non_defanged:
        print("\n⚠️  AVISO: los siguientes kits NO están marcados como 'defanged' en su meta.json:")
        for k in non_defanged:
            print(f"    - {k['folder']} (status={k['status']!r})")
        print("   Revísalos antes de publicar nada — ver RULES.md.\n")

    OUTPUT_PATH.parent.mkdir(parents=True, exist_ok=True)
    OUTPUT_PATH.write_text(
        json.dumps({"total": len(kits), "kits": kits}, indent=2, ensure_ascii=False),
        encoding="utf-8",
    )
    print(f"\nTotal indexado: {len(kits)} kit(s)")
    print(f"Escrito en: {OUTPUT_PATH}")


if __name__ == "__main__":
    main()
