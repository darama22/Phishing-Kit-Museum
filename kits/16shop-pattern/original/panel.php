<?php
/*
 * panel.php — FUNCIONAL de verdad: lee panel_config.php y verify.ini
 * REALES y genera la vista previa según lo que elijas. No hay ninguna
 * petición de red — todo es lógica local sobre archivos de configuración
 * reales. Ver annotations.md, secciones 1-2, y HOW_TO_RUN_LOCALLY.md.
 */

require __DIR__ . '/panel_config.php';
$languages = parse_ini_file(__DIR__ . '/verify.ini', true);

$selected_brand = $_GET['brand'] ?? null;
$selected_lang = $_GET['lang'] ?? null;
$generated = null;

if ($selected_brand && $selected_lang && isset($brand_catalog[$selected_brand]) && isset($languages[$selected_lang])) {
    // generate_kit_stub() solo registra en el log local qué se generaría —
    // ver panel_config.php. No produce ningún archivo desplegable real.
    generate_kit_stub($selected_brand, $selected_lang);
    $generated = [
        'brand' => $brand_catalog[$selected_brand]['label'],
        'price' => $brand_catalog[$selected_brand]['price_usd'],
        'text'  => $languages[$selected_lang],
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Panel 16Shop (funcional)</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="panel">
    <div class="badge">🛒 Phishing-as-a-Service — panel funcional de demo</div>
    <h1>Elige marca e idioma — lectura real de panel_config.php y verify.ini</h1>
    <form method="GET" class="picker">
      <select name="brand">
        <option value="">-- marca --</option>
        <?php foreach ($brand_catalog as $key => $b): ?>
          <option value="<?= htmlspecialchars($key) ?>" <?= $selected_brand === $key ? 'selected' : '' ?>><?= htmlspecialchars($b['label']) ?> ($<?= $b['price_usd'] ?>)</option>
        <?php endforeach; ?>
      </select>
      <select name="lang">
        <option value="">-- idioma --</option>
        <?php foreach ($languages as $key => $_): ?>
          <option value="<?= htmlspecialchars($key) ?>" <?= $selected_lang === $key ? 'selected' : '' ?>><?= htmlspecialchars($key) ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Generar (demo)</button>
    </form>

    <?php if ($generated): ?>
    <div class="result">
      <p class="result-label">Paquete generado (simulado) para <strong><?= htmlspecialchars($generated['brand']) ?></strong> — $<?= $generated['price'] ?>:</p>
      <div class="preview-card">
        <div class="preview-subject"><?= htmlspecialchars($generated['text']['subject']) ?></div>
        <div class="preview-body"><?= htmlspecialchars($generated['text']['body']) ?></div>
        <div class="preview-btn"><?= htmlspecialchars($generated['text']['button']) ?></div>
      </div>
      <p class="fine-print">Esto es exactamente lo que el panel real le mostraría al comprador antes de descargar el paquete — la diferencia es que aquí no se genera ningún .zip desplegable, solo esta vista previa.</p>
    </div>
    <?php endif; ?>

    <p class="fine-print" style="margin-top:20px;">American Express era la opción más cara según la investigación de Trend Micro. Ver <code>panel_config.php</code> y <code>verify.ini</code> (archivos reales, leídos de verdad por este panel).</p>
  </div>
</body>
</html>
