<?php
/*
 * dashboard.php — FUNCIONAL. Ver annotations.md, secciones 4-5, y
 * HOW_TO_RUN_LOCALLY.md. El "saldo" y el "gráfico" son ficticios y fijos
 * — nunca hay ninguna criptomoneda ni plataforma real detrás. El botón
 * de retirar SIEMPRE falla, replicando fielmente el patrón real (retirar
 * cantidades pequeñas al principio SÍ "funciona"; una grande, no).
 */

$withdraw_attempted = isset($_POST['withdraw']);
if ($withdraw_attempted) {
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== intento de retirada bloqueado (demo, patrón real) ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — Plataforma de inversión falsa</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="dash">
    <div class="dash-title">📈 CryptoGrowth Pro <span style="color:#f87171;font-size:10px;">(demo genérico, no es real)</span></div>
    <div class="dash-sub">Tu cartera — actualizado hace 2 min (ficticio)</div>
    <div class="balance">$47,382.19</div>
    <div class="balance-label">▲ +312% desde tu primer depósito (demo)</div>
    <div class="chart-fake"></div>
    <?php if ($withdraw_attempted): ?>
      <p style="background:#450a0a;color:#fca5a5;font-size:11.5px;padding:10px;border-radius:6px;margin-bottom:12px;">⚠️ Retirada rechazada: "se requiere pagar antes una comisión de liberación del 15% para procesar retiradas superiores a $10.000." — así es exactamente como funciona el golpe final real.</p>
    <?php endif; ?>
    <form method="POST">
      <input type="hidden" name="withdraw" value="1">
      <button type="submit" class="withdraw-btn">Retirar fondos (demo)</button>
    </form>
    <p style="font-size:10px;color:#64748b;margin-top:14px;">Revisa <code>__DEMO_LOG__.txt</code> en esta carpeta. <a href="index.html" style="color:#93c5fd;">&larr; volver</a></p>
  </div>
</body>
</html>
