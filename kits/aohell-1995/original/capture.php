<?php
/*
 * capture.php — FUNCIONAL, con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, sección 2, y HOW_TO_RUN_LOCALLY.md.
 */

$user = $_POST['screenname'] ?? null;
$pass = $_POST['password'] ?? null;
$card = $_POST['card'] ?? null;

if ($user || $pass || $card) {
    $log_line = "Usuario: $user\nClave: $pass\nTarjeta (demo): $card\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== capturado (demo AOHell, 1995) ===\n$log_line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — gracias</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="im-window">
    <div class="im-title">📨 AOL Staff (demo)</div>
    <div class="im-body">
      <div class="msg-them">¡Gracias! Tu cuenta ha sido verificada.</div>
      <p style="font-size:11px;color:#555;">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
      <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
    </div>
  </div>
</body>
</html>
