# Bangladesh Bank — el atraco de 81 millones — disección

> 📚 Caso real, atribuido por agencias de inteligencia occidentales y
> **SWIFT** al grupo norcoreano **Lazarus**, con análisis de CSO Online e
> ISACA Journal:
> [csoonline.com](https://www.csoonline.com/article/4131864/10-years-later-bangladesh-bank-cyberheist-still-offers-cyber-resiliency-lessons.html).
> Esta sala reconstruye únicamente el **email/cebo** — sin ningún malware
> real (ver aviso al final).

## El mismo grupo, tres salas del museo

Si ya visitaste las salas de **Sony Pictures** y **Ronin/Axie Infinity**,
reconocerás la firma: **Lazarus Group**, el mismo tipo de actor
patrocinado por el estado norcoreano, con un patrón que se repite —
paciencia extrema, spear-phishing con malware, y objetivos elegidos con
precisión quirúrgica. Aquí, el objetivo fue nada menos que un **banco
central**.

## 1. El cebo — `original/index.html`

Como en Target/Fazio y RSA SecurID, todo empezó con un email dirigido con
malware adjunto — nada especialmente sofisticado en la superficie, pero
extremadamente bien dirigido.

## 2. Semanas de "pruebas" antes de actuar

Tras la intrusión inicial, los atacantes obtuvieron las credenciales de
un operador real de **SWIFT** (el sistema internacional de mensajería
bancaria) mediante un registrador de pulsaciones. Entre el 24 de enero y
el 2 de febrero de 2016, hicieron **varias pruebas de acceso**, sin
lanzar aún ninguna transferencia — puro reconocimiento antes del golpe.

## 3. El fallo de seguridad que lo hizo posible

Los cuatro ordenadores y servidores del banco conectados a SWIFT **no
tenían firewall** y estaban conectados directamente a internet abierta —
sin ninguna capa adicional de defensa entre el malware y el sistema de
transferencias internacionales más sensible del mundo.

## 4. El detalle que evitó un desastre mayor

De **35 transferencias fraudulentas** que intentaron los atacantes, solo
**5 se completaron**. El resto se bloquearon porque los propios atacantes
**escribieron mal** el nombre de un beneficiario — una transferencia a la
"Shalika Fandation" (con una falta de ortografía) activó una alerta de
cumplimiento normativo en un banco intermediario, frenando gran parte del
robo. Un simple error tipográfico de los propios criminales salvó, según
las estimaciones, cientos de millones de dólares adicionales.

## 5. El desenlace

Aun así, se robaron **81 millones de dólares**, transferidos a cuentas en
Filipinas y blanqueados después a través de **casinos en Macao**. El
ataque está atribuido a Lazarus Group, vinculado a la inteligencia
norcoreana.

## ⚠️ Nota importante sobre esta sala

Igual que en Target/Fazio, RSA SecurID y Ronin/Axie, esta sala
reconstruye **solo el email/cebo** — deliberadamente **sin** malware
real. Para eso, el proyecto hermano **Malware Research Hub** es el lugar
adecuado.

## 🛡️ Cómo se protege una organización de esto

- Cualquier sistema conectado a redes financieras críticas (como SWIFT)
  necesita **firewall, segmentación y monitorización dedicada** — nunca
  una conexión directa y desprotegida a internet abierta.
- Los controles de cumplimiento normativo (como la revisión de nombres de
  beneficiarios) **funcionan** — son una capa de defensa real, no solo
  burocracia, como demuestra este caso.
- Ninguna organización es "demasiado grande" o "demasiado seria" para ser
  objetivo de spear-phishing dirigido — un banco central lo sufrió.
