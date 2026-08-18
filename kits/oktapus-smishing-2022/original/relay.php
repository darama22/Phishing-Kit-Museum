<?php
/*
 * relay.php — FUNCIONAL. Ver annotations.md, sección 3, y
 * HOW_TO_RUN_LOCALLY.md. En el ataque real, este es el paso que reenvía
 * el código MFA a los atacantes EN TIEMPO REAL, antes de que caduque.
 * Aquí: solo se registra en el log local, nunca sale de tu disco.
 */

$code = $_POST['mfa_code'] ?? null;

if ($code) {
    $line = "=== paso 2: código MFA relevado (demo) ===\nCódigo introducido: $code\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "$line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — flujo completado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="login-box">
    <div class="logo">✅ Demo completada</div>
    <p class="subtitle">En el ataque real, con contraseña + código válidos, los atacantes entraban directamente en el sistema real de la víctima.</p>
    <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> — ambos pasos quedaron registrados ahí, solo en tu disco.</p>
    <a href="index.html" style="font-size:13px;color:#007dc1;">&larr; volver a probar</a>
  </div>
</body>
</html>
