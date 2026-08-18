<?php
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== paso 2: 'tasa' de notarización enviada, demo, \$250 (ficticio) ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Paso 2</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="step-box">
    <h2>Paso 2 de 3 — "Imprevisto" con aduanas</h2>
    <p>Ha surgido un pequeño problema: las autoridades aduaneras requieren un impuesto adicional para liberar la transferencia internacional.</p>
    <div class="fee-tag">💰 Tasa requerida (demo): $1,200</div>
    <form action="step3.php" method="POST"><button type="submit">Enviar tasa (demo, no real)</button></form>
  </div>
</body>
</html>
