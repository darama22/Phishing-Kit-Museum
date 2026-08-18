<?php
/*
 * panel_config.php — DESACTIVADO A PROPÓSITO. Ver annotations.md, secciones 1 y 3.
 * Reconstrucción educativa del patrón "phishing-as-a-service" documentado
 * por Trend Micro sobre 16Shop. Nunca se ejecuta dentro del museo.
 */

// 1. Catálogo de marcas disponibles en el panel, con precio de ejemplo
//    (ilustrativo — los precios reales no se hicieron públicos en detalle,
//    salvo que American Express era la opción más cara).
$brand_catalog = [
    'apple'  => ['label' => 'Apple ID',           'price_usd' => 50],
    'amazon' => ['label' => 'Amazon',              'price_usd' => 40],
    'paypal' => ['label' => 'PayPal',              'price_usd' => 60],
    'dhl'    => ['label' => 'DHL (envío falso)',   'price_usd' => 35],
    'amex'   => ['label' => 'American Express',    'price_usd' => 90], // la más cara, según la investigación
];

// 2. Licencia atada a la máquina del comprador — anti-piratería entre criminales
function validate_license_stub($license_key, $machine_id) {
    // En el kit real, esto comprobaba contra un servidor del operador que
    // la licencia comprada correspondiera a esta máquina concreta.
    error_log("[DEMO panel_config.php] Validación de licencia simulada (no real)");
    return true; // siempre "válida" en este demo, no hay servidor de licencias real
}

// 3. Generación del paquete de phishing a partir de la elección del comprador
function generate_kit_stub($brand, $language) {
    // En el kit real: copia la plantilla HTML de $brand, aplica el idioma
    // de verify.ini, y empaqueta un .zip listo para subir a un servidor.
    // Aquí: solo deja constancia LOCAL de qué se habría generado — nunca
    // produce ningún archivo desplegable de verdad.
    $line = "[" . date('c') . "] Selección en el panel: brand=$brand lang=$language (ningún paquete real generado)\n";
    file_put_contents(__DIR__ . '/__DEMO_LOG__.txt', $line, FILE_APPEND);
}
