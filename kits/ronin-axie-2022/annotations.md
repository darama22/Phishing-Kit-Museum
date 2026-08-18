# El robo cripto más grande de la historia — disección

> 📚 Atribución oficial del **FBI y el Departamento del Tesoro de EE.UU.**
> al grupo norcoreano Lazarus, con análisis técnico de Chainalysis y
> Halborn: [chainalysis.com](https://www.chainalysis.com/blog/axie-infinity-ronin-bridge-dprk-hack-seizure/) ·
> [halborn.com](https://www.halborn.com/blog/post/explained-the-ronin-hack-march-2022).
> Reconstrucción educativa — sin ningún malware real (ver aviso al final).

## El número que abre esta sala

**625 millones de dólares.** No es una cifra exagerada de titular — es lo
que Lazarus Group robó de una sola red blockchain, y todo empezó con un
mensaje de LinkedIn ofreciendo un trabajo.

## 1. El cebo — no un email, un proceso de contratación entero

Los atacantes no mandaron un archivo malicioso de golpe. Contactaron a
ingenieros senior de Sky Mavis (la empresa detrás de Axie Infinity) por
**LinkedIn**, con ofertas de trabajo que parecían profesionales y
personalizadas según el perfil de cada objetivo.

## 2. La paciencia como arma — `original/fake_job_offer.html`

Aquí está lo que hace este caso distinto de un phishing rápido: hubo
**varias rondas de entrevistas falsas**, con la naturalidad de un proceso
de contratación real. Solo al final, como parte de una supuesta "oferta
de contrato", llegó el archivo malicioso — en el momento en que la
víctima estaba más relajada y menos alerta, tras semanas de proceso.

## 3. El documento — `original/fake_offer_letter.txt`

El archivo se presentaba como el documento del contrato de trabajo. Al
abrirlo, instalaba malware que dio a los atacantes un punto de apoyo
dentro de la infraestructura de Sky Mavis.

## 4. El objetivo técnico — por qué ESE ingeniero, no cualquiera

No era un ataque al azar: buscaban específicamente a alguien con acceso a
los **nodos validadores** de la red Ronin. Esa red necesitaba 5 de 9
firmas de validadores para aprobar una retirada de fondos — los
atacantes comprometieron 4 nodos directamente desde el equipo infectado,
y consiguieron la quinta firma explotando un **nodo RPC mal configurado**
que Sky Mavis usaba para ahorrar comisiones a sus jugadores.

## 5. El desenlace

**173.600 ETH y 25,5 millones de USDC** — unos 625 millones de dólares en
el momento del robo — retirados en dos transacciones. El FBI y el Tesoro
de EE.UU. atribuyeron el ataque a **Lazarus Group**, el mismo tipo de
actor de estado norcoreano vinculado también al hackeo de Sony Pictures
(ver esa sala del museo).

## ⚠️ Nota importante sobre esta sala

Igual que en Target/Fazio y RSA SecurID, esta sala reconstruye **solo el
mensaje de reclutamiento y el documento-cebo** — deliberadamente **sin**
ningún malware real. Para malware/exploits reales, el proyecto hermano
**Malware Research Hub** es el lugar adecuado.

## 🛡️ Cómo protegerte de esto

- Un proceso de contratación **no debería requerir nunca** abrir un
  ejecutable o macro para "completar una prueba técnica" — usa entornos
  aislados si de verdad hace falta ejecutar algo de un desconocido.
- Sospecha especialmente al **final** de un proceso largo y convincente —
  es exactamente cuando bajas la guardia.
- En infraestructuras críticas (blockchain, financiera), **segmenta**
  el acceso: ningún ingeniero individual debería poder comprometer
  múltiples firmas de validación por sí solo.
