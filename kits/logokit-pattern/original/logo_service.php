<?php
/*
 * logo_service.php — nuestro "Clearbit de mentira", 100% LOCAL. FUNCIONAL:
 * dynamic.js le hace un fetch() real a este archivo. Nunca se conecta a
 * Clearbit, Google ni ningún servicio externo — genera un SVG a partir
 * del dominio recibido, con las mismas iniciales, para demostrar el
 * mecanismo real ("logo personalizado según el dominio de la víctima")
 * sin depender de ningún servicio de terceros. Ver annotations.md, sección 2.
 */

header('Content-Type: image/svg+xml');

$domain = $_GET['domain'] ?? 'demo.invalid';
$initial = strtoupper(substr($domain, 0, 1));
// color determinista a partir del dominio, solo para que cada empresa "distinta" se vea distinta
$hue = crc32($domain) % 360;

echo <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48">
  <rect width="48" height="48" rx="8" fill="hsl($hue, 65%, 45%)"/>
  <text x="24" y="31" font-size="20" fill="white" text-anchor="middle" font-family="sans-serif">$initial</text>
</svg>
SVG;
