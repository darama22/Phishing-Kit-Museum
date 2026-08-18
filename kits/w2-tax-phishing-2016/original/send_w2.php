<?php
/*
 * send_w2.php — FUNCIONAL. Ver annotations.md, secciones 1 y 4, y
 * HOW_TO_RUN_LOCALLY.md. Simula el envío de los W-2 — registra
 * localmente que "se habrían enviado", con datos ficticios. Nunca envía
 * ningún email real ni datos reales de nadie.
 */

$fake_employees = ['Empleado Demo 1', 'Empleado Demo 2', 'Empleado Demo 3'];
$log_line = "Se 'enviarían' W-2 ficticios de: " . implode(', ', $fake_employees) . "\nFecha: " . date('c') . "\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== W-2 'enviados' al falso CEO (demo) ===\n$log_line\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — enviado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="email-mock">
    <div class="email-header"><span class="subject">⚠️ Demo completada</span></div>
    <div class="email-body">
      <p>En el ataque real, esto habría enviado los datos fiscales completos de TODOS los empleados de la empresa al atacante, listos para cometer fraude de identidad masivo.</p>
      <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
      <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
    </div>
  </div>
</body>
</html>
