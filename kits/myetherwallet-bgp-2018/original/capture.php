<?php
/*
 * capture.php — FUNCIONAL, con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, sección 3, y HOW_TO_RUN_LOCALLY.md.
 *
 * ⚠️ RECORDATORIO: esto es una demo. NUNCA escribas una clave privada o
 * frase semilla real en este ni en ningún formulario — una clave privada
 * de verdad da control TOTAL e IRREVERSIBLE sobre fondos reales. Usa
 * siempre texto inventado al probar este kit.
 */

$key = $_POST['private_key'] ?? null;

if ($key) {
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== 'clave' capturada (demo, texto de prueba) ===\n$key\nFecha: " . date('c') . "\n\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — capturado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="login-box">
    <div class="logo">⚠️ Demo completada</div>
    <div class="result-box">En el ataque real, esto le daba a los atacantes control total e inmediato sobre los fondos de la wallet. Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</div>
    <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
