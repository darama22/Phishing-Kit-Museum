const I18N = {
  es: {
    banner_warning: "⚠️ Fines educativos y de concienciación. Todos los kits están DESACTIVADOS (sin backend funcional, sin datos de víctimas). Ver RULES.md.",
    nav_subtitle: "local · privado",
    catalog_title: "Salas del museo",
    catalog_subtitle: "Cada kit desmontado y anotado: la máscara visual, la trampa de captura, la fuga de datos y los trucos de evasión que usan de verdad.",
    back_to_catalog: "← volver al museo",
    badge_defanged: "defang-eado",
    section_preview: "Vista previa de la máscara",
    section_annotations: "Disección",
    section_files: "Archivos",
    section_evasion: "Técnicas de evasión",
    section_source: "Fuente",
    no_evasion: "Ninguna documentada",
    no_files: "Sin archivos",
    no_kits: "Aún no hay kits indexados. Añade uno en kits/ y corre indexer.py.",
    fallback_notice: "⚠ Aún no hay traducción al inglés de esta disección — se muestra en español.",
    close: "cerrar ✕",
    target_label: "Objetivo:",
    vector_label: "Vector:",
    launch_btn: "🚀 Levantar sala (PHP local)",
    launch_busy: "Arrancando…",
    stop_btn: "⏹ Detener",
    launch_running: "En marcha en",
    launch_error_prefix: "No se pudo levantar: ",
    launch_note: "Arranca un servidor PHP real, solo en tu máquina (127.0.0.1) — nunca accesible desde fuera. El \"robo\" se queda siempre en un archivo de log local.",
  },
  en: {
    banner_warning: "⚠️ Educational / awareness purposes only. Every kit is DEFANGED (no functional backend, no victim data). See RULES.md.",
    nav_subtitle: "local · private",
    catalog_title: "Museum rooms",
    catalog_subtitle: "Every kit torn down and annotated: the visual mask, the credential trap, the data leak, and the real evasion tricks behind it.",
    back_to_catalog: "← back to the museum",
    badge_defanged: "defanged",
    section_preview: "Mask preview",
    section_annotations: "Teardown",
    section_files: "Files",
    section_evasion: "Evasion techniques",
    section_source: "Source",
    no_evasion: "None documented",
    no_files: "No files",
    no_kits: "No kits indexed yet. Add one under kits/ and run indexer.py.",
    fallback_notice: "⚠ No English teardown yet for this kit — showing the Spanish version.",
    close: "close ✕",
    target_label: "Target:",
    vector_label: "Vector:",
    launch_btn: "🚀 Spin up room (local PHP)",
    launch_busy: "Starting…",
    stop_btn: "⏹ Stop",
    launch_running: "Running at",
    launch_error_prefix: "Couldn't launch: ",
    launch_note: "Starts a real PHP server, only on your machine (127.0.0.1) — never reachable from outside. The \"theft\" always stays in a local log file.",
  },
};

function getLang() { return localStorage.getItem("pkm_lang") || "es"; }
function setLang(lang) { localStorage.setItem("pkm_lang", lang); }
function t(key) {
  const dict = I18N[getLang()] || I18N.es;
  return dict[key] !== undefined ? dict[key] : (I18N.es[key] !== undefined ? I18N.es[key] : key);
}
function applyStaticTranslations() {
  document.querySelectorAll("[data-i18n]").forEach(el => { el.textContent = t(el.dataset.i18n); });
  document.querySelectorAll(".lang-btn").forEach(btn => btn.classList.toggle("active", btn.dataset.lang === getLang()));
}
