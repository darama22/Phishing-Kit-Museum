# MyEtherWallet — el secuestro de BGP — disección

> 📚 Caso real, documentado por **BleepingComputer** y **Virus Bulletin**,
> con comunicación oficial de MyEtherWallet:
> [bleepingcomputer.com](https://www.bleepingcomputer.com/news/security/hacker-hijacks-dns-server-of-myetherwallet-to-steal-160-000/).
> Reconstrucción educativa del formulario de wallet — sin ninguna
> manipulación de red real.

## La sala que rompe el consejo número uno de todo el museo

En cada sala anterior te hemos dicho lo mismo: *"comprueba la URL, letra
a letra".* Esta sala es la excepción que demuestra que **incluso ese
consejo tiene un límite** — porque aquí, la URL en la barra de
direcciones era **exactamente la correcta**.

## 1. No hay cebo — ese es el punto

No hubo ningún email, ningún enlace sospechoso, ninguna app maliciosa.
La víctima simplemente escribió `myetherwallet.com`, como hacía siempre.
El problema no estaba en la víctima ni en su comportamiento — estaba en
**la propia infraestructura de internet**.

## 2. BGP — la parte de internet que casi nadie vigila

**BGP (Border Gateway Protocol)** es el sistema que decide, a nivel
global, por dónde viaja el tráfico entre redes distintas — es la "guía de
carreteras" de internet. El 24 de abril de 2018, alguien envió mensajes
BGP falsos convenciendo a routers centrales de que el tráfico destinado a
los servidores DNS de Amazon (los que usaba MEW) debía enviarse, en
realidad, a un servidor bajo su control.

## 3. La trampa — `original/index.html`

Con las rutas de internet secuestradas, cualquiera que intentara
resolver `myetherwallet.com` acababa en una **wallet falsa**, alojada en
un servidor en Rusia — indistinguible a simple vista de la real.

## 4. La única grieta — y por qué casi nadie la notó

El único indicio visible fue una **advertencia de certificado TLS**: el
navegador avisaba de que el certificado de seguridad no coincidía. La
mayoría de usuarios, sin entender bien qué significa ese aviso, lo
ignoraron y continuaron.

## 5. El desenlace

Se robaron unos **160.000 dólares** en Ethereum antes de que el ataque
fuera detectado y neutralizado. Investigadores de seguridad bautizaron
esta categoría de ataque como **"MEWKit"**.

## 🛡️ Cómo protegerte de esto (y por qué es tan difícil)

- **Nunca ignores una advertencia de certificado TLS**, por muy
  familiar que te resulte el sitio — es la única señal visible en este
  tipo de ataque.
- Este caso demuestra por qué existen protocolos como **DNSSEC** (para
  autenticar respuestas DNS) y **HSTS** (que impide directamente cargar
  la web si el certificado no es de confianza) — su ausencia fue
  precisamente lo que hizo posible este ataque.
- Para infraestructuras críticas: hay muy poco que un usuario individual
  pueda hacer contra un secuestro de BGP — la responsabilidad recae en
  los proveedores de red y los propios servicios, adoptando estos
  protocolos de protección.
