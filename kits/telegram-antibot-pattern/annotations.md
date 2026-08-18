# Patrón Antibot + Telegram — disección

> 📚 Basado en la investigación pública de **SiteLock**, *"The Anatomy Of A
> Phishing Kit"*, que analizó un kit real dirigido a una cooperativa de
> crédito estadounidense: [sitelock.com/blog/anatomy-of-a-phishing-kit](https://www.sitelock.com/blog/anatomy-of-a-phishing-kit/).
> El código de este kit es una **reconstrucción educativa** del patrón
> documentado, no una copia de un kit robado — con toda comunicación externa
> comentada y desactivada.

Este caso es un salto de nivel respecto a la sala "Phish in a Barrel": ya no
es un script PHP suelto, es un **kit profesionalizado** con módulos.

## 1. La máscara — `original/index.html`

Igual que en el patrón clásico, un clon del formulario de login. La
diferencia está en lo que hay **antes** de que la víctima llegue a verlo.

## 2. El portero — `original/Antibot.php`

Antes de mostrar NADA, el kit real comprueba:
- **User-Agent**: si detecta un bot conocido de seguridad (escáneres,
  Google Safe Browsing), muestra un 404 o una página en blanco.
- **Hostname/IP**: bloquea rangos de IP de empresas de ciberseguridad
  conocidas (así los analistas no ven el phishing cuando lo investigan
  desde su oficina).

Solo si pasas ese filtro, el kit te enseña la web falsa de verdad. Es la
razón por la que a veces un mismo enlace de phishing "no funciona" cuando lo
abre un analista, pero sí infecta a usuarios normales.

## 3. El cerebro — `original/zsec_config.php`

Un archivo de configuración separado con las **claves de API** y el
**host remoto** al que el kit reporta — es decir, el kit no actúa solo, habla
con una infraestructura de mando y control (C&C) del propio operador del
kit, que puede gestionar varias campañas de phishing distintas desde un
único panel central.

## 4. La fuga doble — `original/mainnet.php`

Aquí es donde se manda lo robado, y por **dos vías a la vez**:
1. Un archivo de log **local**, en el propio servidor comprometido.
2. Un mensaje a un **bot de Telegram**, en tiempo real — el atacante recibe
   la credencial robada en su móvil segundos después de que la víctima la
   escriba.

**Por qué Telegram y no email:** es instantáneo, difícil de rastrear hasta
una identidad real, y no depende de que el servidor comprometido tenga
`mail()` bien configurado.

## 🛡️ Cómo protegerte

- Estos kits son más difíciles de detectar por herramientas automáticas
  (por el filtro anti-bot) — la defensa real recae más en el usuario:
  desconfía de enlaces por SMS/email aunque "parezcan" pasar los filtros.
- 2FA sigue siendo la defensa más eficaz: roban la contraseña al instante,
  pero sin el segundo factor no entran a la cuenta.
