<?php
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== paso 3: 'impuesto aduanero' enviado, demo, \$1200 (ficticio) — SIEMPRE hay un paso más ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — el patrón se repite para siempre</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="step-box">
    <h2>⚠️ Paso 3 de 3 — pero nunca es realmente el último</h2>
    <p>En el fraude real, este ciclo se repite indefinidamente: siempre aparece una tasa más, un soborno más, un documento más — hasta que la víctima se queda sin dinero o se da cuenta del engaño. <strong>La fortuna prometida nunca existió.</strong></p>
    <p style="font-size:11px;color:#888;">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta — ahí ves los tres "pagos" ficticios registrados.</p>
    <a href="index.html" style="font-size:12px;color:#ca8a04;">&larr; volver a probar</a>
  </div>
</body>
</html>
