# El email al proveedor de aire acondicionado — disección

> 📚 Investigación original de **Brian Krebs (KrebsOnSecurity)**, el
> periodista que destapó cómo empezó todo:
> [krebsonsecurity.com — Target Hackers Broke in Via HVAC Company](https://krebsonsecurity.com/2014/02/target-hackers-broke-in-via-hvac-company/) ·
> [Email Attack on Vendor Set Up Breach at Target](https://krebsonsecurity.com/2014/02/email-attack-on-vendor-set-up-breach-at-target/).
> Esta sala reconstruye únicamente el **email/cebo** que inició la cadena —
> no incluye ningún código de malware real (ver aviso al final).

## La lección más importante de todo el museo

Ninguna otra sala enseña esto tan claro: **el atacante no necesita romper
tu seguridad si puede romper la de alguien en quien tú confías.** Target
tenía defensas serias. Fazio Mechanical, la empresa que revisaba el aire
acondicionado de sus tiendas, no.

## 1. El objetivo real no era el aire acondicionado

Fazio Mechanical tenía acceso remoto legítimo a sistemas de Target para
gestionar contratos, facturación y monitorización de energía. Ese acceso,
pensado para tareas administrativas aburridas, resultó ser una puerta
hacia la red de uno de los mayores retailers de EE.UU.

## 2. El cebo — `original/fazio_phishing_email.html`

Un empleado de Fazio recibió un email de phishing dirigido (*spear
phishing*) con un archivo adjunto malicioso. Al abrirlo, se instaló
**Citadel** — un troyano bancario derivado del código filtrado de Zeus.

## 3. Por qué esto es distinto a un kit de captura web

A diferencia de las otras salas del museo, aquí no hay una web falsa
pidiendo una contraseña. Citadel es **malware real** que, una vez dentro
del ordenador de la víctima, roba directamente las credenciales **ya
guardadas** en el sistema, además de grabar pantalla y pulsaciones de
teclado. No hace falta que la víctima "entregue" nada activamente.

## 4. La cadena completa — de un PC a 40 millones de tarjetas

1. Citadel captura credenciales legítimas de Fazio.
2. Los atacantes usan esas credenciales para entrar en sistemas de Target
   conectados a Fazio.
3. Una vez dentro, se **mueven lateralmente** por la red durante semanas.
4. Finalmente llegan a los **terminales de punto de venta** de 1.797
   tiendas y despliegan malware para capturar los datos de las tarjetas
   de pago en el momento de cada compra.

## 5. El desenlace

Se comprometieron datos de tarjetas de pago de unos **40 millones de
clientes** y datos personales de unos **70 millones** — una de las
brechas de retail más grandes de la historia, con enormes costes legales
y de reputación para Target.

## ⚠️ Nota importante sobre esta sala

Esta sala reconstruye **solo el email/cebo** que dio inicio al ataque —
deliberadamente **no** incluimos código del troyano Citadel ni de ningún
malware real: eso queda fuera del alcance (y de las reglas) de este museo,
que trata sobre *kits de phishing*, no sobre malware ejecutable. Si te
interesa investigar troyanos bancarios reales como Citadel o la familia
Zeus, ese es el terreno del proyecto hermano **Malware Research Hub**,
donde las muestras se guardan siempre cifradas y catalogadas con ese
propósito específico.

## 🛡️ Cómo se protege una organización de esto

- Evalúa la seguridad de tus **proveedores** con el mismo rigor que la
  tuya propia — su acceso a tu red es, en la práctica, una extensión de
  tu perímetro.
- **Segmenta la red**: el acceso de un proveedor de HVAC nunca debería
  poder llegar hasta terminales de punto de venta.
- Un antivirus gratuito (como tenía Fazio) no es suficiente frente a
  malware dirigido y sofisticado.
