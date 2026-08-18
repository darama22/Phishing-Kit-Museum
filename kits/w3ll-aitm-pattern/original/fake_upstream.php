<?php
/*
 * fake_upstream.php — el "Microsoft" de mentira de esta demo. FUNCIONAL,
 * pero es un servicio 100% LOCAL inventado por el museo — no es Microsoft
 * ni se conecta a Microsoft de ninguna forma. Su único propósito es dar
 * al proxy_relay.php algo real a lo que reenviar peticiones, para que el
 * mecanismo AiTM se pueda demostrar completo sin tocar ningún servicio
 * de verdad. Ver annotations.md, sección 2.
 */

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if ($user && $pass) {
    // Simula lo que Microsoft haría tras un login+2FA correctos: emitir
    // una cookie de sesión. Esta cookie es FICTICIA y solo vale para este
    // servidor de mentira — no abre nada real en ningún sitio.
    $fake_session = bin2hex(random_bytes(16));
    setcookie('ESTSAUTH_DEMO', $fake_session, ['path' => '/']);
    header('Content-Type: text/plain');
    echo "LOGIN_OK\nsession=$fake_session";
} else {
    http_response_code(400);
    echo "faltan credenciales";
}
