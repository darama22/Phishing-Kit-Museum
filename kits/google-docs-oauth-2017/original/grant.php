<?php
/*
 * grant.php — FUNCIONAL. Ver annotations.md, secciones 3-4, y
 * HOW_TO_RUN_LOCALLY.md. Simula lo que ocurre al pulsar "Permitir": se
 * registra localmente un "token" ficticio (nunca un token real de
 * Google) y se muestra qué haría el gusano a continuación — sin enviar
 * NADA a ningún contacto real ni a ningún sitio externo.
 */

$fake_token = bin2hex(random_bytes(12));
$log_line = "Token OAuth ficticio concedido: $fake_token\nFecha: " . date('c') . "\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== consentimiento OAuth concedido (demo) ===\n$log_line\n", FILE_APPEND);

$fake_contacts = ['ana@demo.invalid', 'luis@demo.invalid', 'marta@demo.invalid'];
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Acceso concedido</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="consent-box">
    <div class="app-row">
      <span class="app-icon">✅</span>
      <div><div class="app-name">Acceso concedido (demo)</div></div>
    </div>
    <p class="warn-note">En el ataque real, la app ahora leería tu lista de contactos y se auto-reenviaría a cada uno — así se propagaba como un gusano. Aquí, con contactos ficticios, solo lo documentamos:</p>
    <div class="perms">
      <?php foreach ($fake_contacts as $c): ?>
        <div class="perm-item">📧 (demo) reenviado a: <?= htmlspecialchars($c) ?></div>
      <?php endforeach; ?>
    </div>
    <p style="font-size:11px;color:#888;">Revisa <code>__DEMO_LOG__.txt</code> — nada de esto salió de tu disco.</p>
    <a href="index.html" style="font-size:12px;">&larr; volver a probar</a>
  </div>
</body>
</html>
