<?php
/*
 * call.php — FUNCIONAL. Ver annotations.md, secciones 3-4, y
 * HOW_TO_RUN_LOCALLY.md. Simula la llamada y la petición de "acceso
 * remoto" — nunca instala ni ejecuta ningún software real.
 */
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== víctima llamó al número falso (demo) ===\nFecha: " . date('c') . "\n\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>DEMO — "Al teléfono"</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="call-panel">
    <h2>📞 "Técnico" (demo genérico)</h2>
    <p>"Gracias por llamar. Veo el problema en su equipo — para solucionarlo necesito que instale nuestra herramienta de acceso remoto. Es rápido y gratuito."</p>
    <form action="grant.php" method="POST">
      <button type="submit">Conceder "acceso remoto" (demo, no instala nada real)</button>
    </form>
  </div>
</body>
</html>
