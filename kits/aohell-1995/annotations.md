# AOHell — el origen de la palabra "phishing" — disección

> 📚 Investigación académica de **Koceilah Rekouche**, el propio creador
> de AOHell, publicada décadas después bajo su verdadero nombre:
> ['Early Phishing' (arXiv)](https://arxiv.org/abs/1106.4692).
> Reconstrucción educativa sin ningún generador de tarjetas real ni
> herramienta funcional de la época.

## Por qué esta es la sala fundacional del museo

Todas las demás salas —desde un email falso de Google hasta un proxy que
roba sesiones de Microsoft 365— son **variaciones sobre una idea que
nació aquí, en 1995**, en las salas de chat de AOL. Literalmente: la
palabra "phishing" se documentó por primera vez describiendo esto.

## 1. El creador — un adolescente, no una organización criminal

AOHell lo escribió un estudiante de instituto de 17 años, bajo el
pseudónimo *"Da Chronic"*. No había mafias organizadas, ni estados,
ni empresas de "phishing-as-a-service" — solo curiosidad adolescente y un
error de diseño en un servicio nuevo y masivo.

## 2. El cebo — `original/aol_chat_mock.html`

El "kit" no era una web — era un **mensaje de chat o de AOL Instant
Messenger**, haciéndose pasar por un empleado de AOL, pidiendo
"confirmar" la contraseña o los datos de la tarjeta de crédito de la
cuenta. Nada de páginas clonadas: **la ingeniería social pura era
suficiente**, porque nadie esperaba ese tipo de engaño todavía.

## 3. El detalle más ingenioso — cuentas gratis para atacar

AOHell explotaba un fallo en el algoritmo con el que AOL generaba/validaba
números de tarjeta de crédito para dar de alta cuentas nuevas. El
programa **generaba números "válidos" según ese algoritmo** (sin ser
tarjetas reales de nadie), y con ellos abría cuentas de AOL gratuitas y
desechables — perfectas para lanzar el ataque sin dejar rastro de una
cuenta real.

## 4. Por qué el nombre "phishing" con "ph"

La ortografía viene directamente de **"phreaking"**, la cultura de
manipular sistemas telefónicos para hacer llamadas gratis en los años 70
y 80 — la comunidad de la que salió buena parte de la primera generación
de hackers de internet. "Phishing" apareció documentado por primera vez
en el grupo de Usenet `alt.2600`, un punto de encuentro clásico de esa
misma cultura.

## 5. El legado — 30 años después

Todo lo que has visto en el resto del museo —clonado de webs, OAuth,
vishing, AiTM, BEC millonario— es la **misma idea de 1995**, cada vez con
más sofisticación técnica pero exactamente el mismo núcleo: hacerse pasar
por alguien de confianza para que entregues algo tú mismo.

## 🛡️ La lección que nunca caduca

Ninguna tecnología nueva resuelve esto del todo, porque el objetivo nunca
ha sido un sistema informático — **siempre ha sido una persona confiando
en la autoridad equivocada.** Es la misma lección en 1995 que en 2025.
