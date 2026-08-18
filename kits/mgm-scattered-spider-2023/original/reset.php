<?php
/*
 * reset.php — FUNCIONAL. Ver annotations.md, secciones 2 y 4, y
 * HOW_TO_RUN_LOCALLY.md. Registra localmente el "restablecimiento"
 * simulado — nunca se conecta a ninguna herramienta real de gestión de
 * identidad (Okta, Azure AD, etc.).
 */

$name = $_POST['employee_name'] ?? null;
$phone = $_POST['new_phone'] ?? null;
$reason = $_POST['reason'] ?? null;

if ($name || $phone) {
    $line = "Empleado suplantado (demo): $name\nNuevo teléfono MFA (demo): $phone\nMotivo alegado: $reason\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== restablecimiento concedido por el helpdesk (demo) ===\n$line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Restablecimiento procesado</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="panel">
    <h1>⚠️ Restablecimiento procesado (demo)</h1>
    <div class="result-box">
      En el caso real, este único paso dio a los atacantes acceso con privilegios de super-administrador al entorno Okta de MGM — y desde ahí, a Azure y más de 100 hipervisores ESXi. Un cambio "pequeño" con consecuencias enormes.
    </div>
    <p class="fine-print">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta.</p>
    <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
