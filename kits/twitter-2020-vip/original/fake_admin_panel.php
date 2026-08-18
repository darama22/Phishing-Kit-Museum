<?php
/*
 * fake_admin_panel.php — FUNCIONAL. Ver annotations.md, secciones 4-5, y
 * HOW_TO_RUN_LOCALLY.md. Acepta cualquier usuario/contraseña de prueba
 * (es una demo, no valida nada real) y muestra un panel FICTICIO con
 * cuentas de ejemplo — nunca cuentas ni nombres reales, y ningún botón
 * hace ninguna petición de red de verdad. Solo escribe en un log local.
 */

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if (!$user || !$pass) {
    header('Location: index.html');
    exit;
}

// Se registra el "acceso" localmente — como en el caso real, la
// credencial robada por vishing es lo único que hacía falta:
$log_line = "Usuario: $user\nClave: $pass\nFecha: " . date('c') . "\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== acceso al panel interno (demo) ===\n$log_line\n", FILE_APPEND);

$demo_accounts = ['@demo_ceo_ficticio', '@demo_celebridad_ficticia', '@demo_empresa_cripto_ficticia'];
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Panel interno (acceso concedido)</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="panel">
    <h1>✅ Sesión revalidada — Panel de gestión de cuentas (demo)</h1>
    <p class="warn">DEMO: en el caso real, este tipo de panel daba control directo sobre cualquier cuenta de la plataforma. Aquí las cuentas son ficticias y ningún botón envía nada a ningún sitio.</p>
    <?php foreach ($demo_accounts as $acct): ?>
      <div class="acct-row">
        <span><?= htmlspecialchars($acct) ?></span>
        <button onclick="alert('DEMO: en el caso real, aquí se podía publicar directamente en nombre de esta cuenta. Este botón no hace nada real.')">Gestionar (demo)</button>
      </div>
    <?php endforeach; ?>
    <p class="fine-print2">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta — ahí quedó constancia local de este "acceso" de prueba.</p>
  </div>
</body>
</html>
