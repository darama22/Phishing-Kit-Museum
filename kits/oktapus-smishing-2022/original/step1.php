<?php
/*
 * step1.php — FUNCIONAL. Ver annotations.md, secciones 2-3. Captura el
 * primer paso (contraseña) en un log LOCAL, y pide el "código MFA" —
 * exactamente el patrón de dos pasos documentado por Group-IB.
 */

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if (!$user || !$pass) {
    header('Location: index.html');
    exit;
}

file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== paso 1: credenciales (demo) ===\nUsuario: $user\nClave: $pass\nFecha: " . date('c') . "\n\n", FILE_APPEND);

// En un ataque real, el código llegaría por SMS al teléfono REAL de la
// víctima. En este demo autocontenido, lo generamos y mostramos aquí
// mismo para que puedas completar el flujo sin un teléfono de verdad:
$demo_code = str_pad(strval(random_int(0, 999999)), 6, '0', STR_PAD_LEFT);
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "(código MFA de demo generado: $demo_code — en la vida real llegaría por SMS al teléfono de la víctima)\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Código MFA</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="login-box">
    <div class="logo">🔐 Empresa Demo S.A. <span>vía Okta (demo genérico)</span></div>
    <p class="subtitle">Introduce el código enviado por SMS</p>
    <div class="code-display"><?= htmlspecialchars($demo_code) ?></div>
    <p style="font-size:10.5px;color:#b45309;margin:-10px 0 14px;">DEMO: en un ataque real este código NO se te mostraría aquí — llegaría por SMS a tu teléfono real. Te lo enseñamos para que puedas completar el flujo.</p>
    <form action="relay.php" method="POST">
      <input type="text" name="mfa_code" placeholder="Código de 6 dígitos" autocomplete="off">
      <button type="submit">Verificar</button>
    </form>
  </div>
</body>
</html>
