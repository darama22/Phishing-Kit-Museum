<?php
/*
 * authorize.php — FUNCIONAL. Ver annotations.md, sección 4, y
 * HOW_TO_RUN_LOCALLY.md. Registra localmente la "autorización" de
 * prueba — nunca se conecta a ningún sistema bancario real.
 */

$amount = $_POST['amount'] ?? null;

if ($amount) {
    $line = "Importe autorizado (demo): $amount\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== transferencia autorizada tras videollamada deepfake (demo) ===\n$line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Autorizado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="call-window">
    <div class="call-title">⚠️ Transferencia autorizada (demo)</div>
    <p class="call-note">En el caso real, esto se repitió 14 veces, por un total de 25 millones de dólares, hacia 5 cuentas en Hong Kong.</p>
    <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
    <a href="index.html" style="font-size:12px;color:#93c5fd;">&larr; volver a probar</a>
  </div>
</body>
</html>
