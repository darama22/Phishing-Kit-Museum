<?php
/*
 * swap.php — FUNCIONAL. Ver annotations.md, secciones 2-4, y
 * HOW_TO_RUN_LOCALLY.md. Registra localmente el "SIM swap" simulado, y
 * demuestra qué pasaría con el siguiente código 2FA — nunca se conecta a
 * ningún operador telefónico real.
 */

$phone = $_POST['phone'] ?? null;
$reason = $_POST['reason'] ?? null;

if ($phone) {
    $line = "Número 'transferido' (demo): $phone\nMotivo alegado: $reason\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== SIM swap procesado (demo) ===\n$line\n", FILE_APPEND);
}
$demo_code = str_pad(strval(random_int(0, 999999)), 6, '0', STR_PAD_LEFT);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — SIM swap procesado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="panel">
    <h1>⚠️ SIM swap procesado (demo)</h1>
    <p class="intro">A partir de aquí, cualquier SMS de 2FA dirigido a ese número llegaría al atacante, no a la víctima:</p>
    <div class="sms-demo">📩 SMS (demo) — Tu código de verificación es: <?= htmlspecialchars($demo_code) ?><br><small>(este SMS ahora "llegaría" al atacante, no a la víctima real)</small></div>
    <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
    <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
