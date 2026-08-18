<?php
/*
 * step1.php / step2.php / step3.php — FUNCIONALES. Ver annotations.md,
 * sección 2, y HOW_TO_RUN_LOCALLY.md. Simulan la escalera de "tasas" que
 * nunca termina. Cada paso registra localmente el importe ficticio
 * pedido — nunca se procesa ningún pago real.
 */
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== paso 1: víctima responde al email (demo) ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Paso 1</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="step-box">
    <h2>Paso 1 de 3 — Tasa de "notarización"</h2>
    <p>¡Excelente noticia! Para iniciar la transferencia, el banco requiere una pequeña tasa de notarización de los documentos.</p>
    <div class="fee-tag">💰 Tasa requerida (demo): $250</div>
    <form action="step2.php" method="POST"><button type="submit">Enviar tasa (demo, no real)</button></form>
  </div>
</body>
</html>
