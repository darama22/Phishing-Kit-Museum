<?php
/*
 * zsec_config.php — FUNCIONAL como estructura de configuración, pero con
 * valores DEMO que no apuntan a ningún servicio real. Ver annotations.md,
 * sección 3. mainnet.php lee este archivo de verdad.
 */
return [
    'telegram_bot_token' => null, // null a propósito: sin token no hay envío posible, ni por error
    'telegram_chat_id'   => null,
    'cnc_host'           => null,
];
