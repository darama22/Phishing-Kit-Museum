<?php
/*
 * approve.php — FUNCIONAL. Ver annotations.md, secciones 3-5, y
 * HOW_TO_RUN_LOCALLY.md. Registra localmente la "aprobación" tras el
 * bombardeo simulado — nunca se conecta a ningún sistema real.
 */

file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== MFA aprobado tras bombardeo simulado (demo) ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — acceso concedido</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="phone">
    <div class="phone-header">⚠️ Acceso concedido (demo)</div>
    <p style="color:#eee;font-size:12px;line-height:1.6;">En el caso real, en cuestión de minutos el atacante tenía acceso a Slack interno, VPN y repositorios de código de Uber.</p>
    <p style="color:#888;font-size:10.5px;">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
    <a href="index.html" style="color:#93c5fd;font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
