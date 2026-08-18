<?php
/*
 * capture.php — FUNCIONAL, con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, secciones 3-4, y HOW_TO_RUN_LOCALLY.md.
 * NUNCA introduzcas datos de tarjeta reales — usa siempre números de
 * prueba inventados.
 */

$card = $_POST['card_number'] ?? null;
$exp = $_POST['expiry'] ?? null;
$cvv = $_POST['cvv'] ?? null;

if ($card) {
    $line = "Tarjeta (demo): $card\nCaducidad (demo): $exp\nCVV (demo): $cvv\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== datos de pago capturados (demo, quishing) ===\n$line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Pago procesado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="login-box">
    <div class="logo">✅ Demo completada</div>
    <p class="subtitle" style="color:#166534;">"Pago" registrado (solo local, demo)</p>
    <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta. En el ataque real, los datos de tu tarjeta habrían ido directamente a los estafadores.</p>
    <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
