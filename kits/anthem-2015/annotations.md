# Anthem 2015 — la mayor brecha sanitaria — disección

> 📚 Caso real, con cargos formales presentados por el **Departamento de
> Justicia de EE.UU.** contra un miembro identificado de un grupo de
> hacking vinculado a China:
> [justice.gov](https://www.justice.gov/archives/opa/pr/member-sophisticated-china-based-hacking-group-indicted-series-computer-intrusions-including).
> Esta sala reconstruye únicamente el **email/cebo** — sin ningún malware
> real (ver aviso al final).

## La cifra que cierra el museo

**78,8 millones de personas.** No exageramos al decir que es la mayor
brecha de datos sanitarios de la historia — y, como en tantas otras salas
de este museo, todo empezó con un simple clic en un enlace.

## 1. El cebo — `original/index.html`

Un email dirigido, disfrazado de comunicación interna legítima, con un
enlace malicioso. Al hacer clic, se instalaba silenciosamente una puerta
trasera en el equipo del empleado.

## 2. La paciencia — meses de reconocimiento silencioso

A diferencia de un ataque que busca robar y salir rápido, aquí los
atacantes se tomaron **meses** para explorar la red de Anthem sin ser
detectados, hasta localizar y entender el sistema más valioso de todos:
el **almacén de datos corporativo (enterprise data warehouse)**, donde se
concentraba la información de decenas de millones de personas.

## 3. La exfiltración — cifrada para pasar desapercibida

Antes de sacar los datos de la red, los propios atacantes los
**comprimieron y cifraron** — así, cualquier herramienta de prevención de
fuga de datos que inspeccionara el tráfico saliente no podía identificar
qué tipo de información se estaba robando.

## 4. Borrando el rastro

Tras completar la exfiltración, eliminaron los archivos cifrados del
sistema de Anthem — reduciendo la evidencia disponible para una
investigación forense posterior.

## 5. El desenlace

Datos de **~78,8 millones de personas** comprometidos: nombres, números
de identificación médica, fechas de nacimiento, números de la Seguridad
Social, direcciones, teléfonos, emails y datos de empleo e ingresos. El
Departamento de Justicia de EE.UU. presentó cargos contra un miembro
identificado de un grupo de hacking vinculado a China.

## ⚠️ Nota importante sobre esta sala

Igual que en las salas de Target/Fazio, RSA SecurID y Ronin/Axie, esta
sala reconstruye **solo el email/cebo** — deliberadamente **sin** ningún
código de puerta trasera ni malware real. Para eso, el proyecto hermano
**Malware Research Hub** es el lugar adecuado.

## 🛡️ Cómo se protege una organización de esto

- Los datos más sensibles (como un almacén de datos corporativo)
  necesitan **capas adicionales** de autenticación y monitorización, no
  solo el mismo perímetro que protege el resto de la red.
- Vigila el tráfico saliente **cifrado y comprimido** hacia destinos
  poco habituales — es precisamente la técnica usada para evadir la
  detección aquí.
- Meses de "silencio" tras una intrusión no significan que no haya
  pasado nada — significan que el atacante está siendo cuidadoso.
