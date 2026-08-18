<?php
/*
 * Antibot.php — FUNCIONAL. Ver annotations.md, sección 2. Este es el
 * filtro real que usa gateway.php — pruébalo con curl (ver ese archivo).
 * No hace ninguna petición de red: la comprobación es local.
 */

// Lista de ejemplo — en un kit real esta lista es mucho más larga y suele
// incluir rangos de IP de empresas de ciberseguridad conocidas.
$GLOBALS['blocked_agents'] = ['bot', 'crawler', 'spider', 'security-scanner-demo', 'curl-bot-demo'];

function is_blocked($user_agent, $ip) {
    foreach ($GLOBALS['blocked_agents'] as $needle) {
        if (stripos($user_agent, $needle) !== false) {
            error_log("[DEMO Antibot.php] Bloqueado por User-Agent sospechoso: $user_agent");
            return true;
        }
    }
    return false;
}
