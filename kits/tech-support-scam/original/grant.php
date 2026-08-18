<?php
/*
 * grant.php — FUNCIONAL. Ver annotations.md, sección 4, y
 * HOW_TO_RUN_LOCALLY.md. Registra localmente la "concesión de acceso" —
 * nunca instala, ejecuta ni transmite nada real.
 */
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== 'acceso remoto' concedido (demo) — ningún software real instalado ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — acceso concedido</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="call-panel">
    <h2>⚠️ Demo completada</h2>
    <p>En el ataque real, a partir de aquí el falso técnico ejecutaría un "escaneo" mostrando problemas inventados, y pediría un pago — o robaría credenciales/instalaría malware de verdad durante la sesión.</p>
    <p style="font-size:10.5px;color:#888;">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
    <a href="index.html" style="font-size:12px;color:#dc2626;">&larr; volver a probar</a>
  </div>
</body>
</html>
