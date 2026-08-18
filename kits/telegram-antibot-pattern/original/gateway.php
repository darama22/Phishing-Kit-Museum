<?php
/*
 * gateway.php — FUNCIONAL. Punto de entrada real del kit: primero pasa
 * por el filtro anti-bot y, solo si lo supera, sirve la página. Ver
 * annotations.md, sección 2, y HOW_TO_RUN_LOCALLY.md.
 *
 * PRUÉBALO TÚ MISMO — con `php -S` arrancado (ver HOW_TO_RUN_LOCALLY.md):
 *
 *   curl http://localhost:PUERTO/gateway.php
 *     -> sirve la página normalmente (User-Agent normal)
 *
 *   curl -A "security-scanner-demo" http://localhost:PUERTO/gateway.php
 *     -> 404, bloqueado por el filtro (mismo mecanismo que un kit real)
 */

require __DIR__ . '/Antibot.php';

if (is_blocked($_SERVER['HTTP_USER_AGENT'] ?? '', $_SERVER['REMOTE_ADDR'] ?? '')) {
    http_response_code(404);
    exit('Not Found');
}

readfile(__DIR__ . '/index.html');
