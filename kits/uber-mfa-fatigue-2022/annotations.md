# Uber 2022 — fatiga de MFA — disección

> 📚 Caso real, cubierto técnicamente por **Dark Reading** y analizado en
> detalle por OnlineHashCrack:
> [darkreading.com](https://www.darkreading.com/cyberattacks-data-breaches/uber-breach-external-contractor-mfa-bombing-attack).
> Reconstrucción educativa — sin ningún bombardeo de notificaciones real.

## Cuando el ataque no es "engañar" sino "agotar"

Todas las demás salas del museo engañan a la víctima haciéndole creer
algo falso. Esta es distinta: el atacante **no necesitaba mentir muy
bien** — solo necesitaba ser **más pesado que la paciencia humana**.

## 1. El punto de partida — una contraseña ya robada por otros

La contraseña del contratista no se robó en este ataque — se **compró**
en un mercado de la dark web. Alguien, antes, ya la había capturado con
un **infostealer** (justo el tipo de malware que catalogamos en el
proyecto hermano Malware Research Hub). El vishing/MFA fatigue fue el
segundo paso, no el primero.

## 2. El bombardeo — `original/index.html`

Con la contraseña en la mano, el atacante inició sesión **una y otra
vez**, durante aproximadamente una hora. Cada intento generaba una
**notificación push** de "¿eres tú intentando entrar?" en el móvil de la
víctima. Una tormenta constante, minuto tras minuto.

## 3. El remate — un mensaje humano cuando la tecnología no basta

Cuando las notificaciones solas no consiguieron una aprobación, el
atacante dio un paso más: contactó **por WhatsApp** haciéndose pasar por
soporte de IT de Uber, diciendo algo como *"perdona el spam de
notificaciones, solo aprueba una para que podamos arreglarlo"*. Ese
último empujón humano fue lo que rompió la resistencia.

## 4. Por qué funciona — el diseño del propio MFA se vuelve en tu contra

El MFA está pensado para que aprobar sea rápido y sin fricción — un
solo toque. Ese mismo diseño, pensado para la comodidad, es lo que hace
posible este ataque: **agotar a alguien es más fácil que hackear un
sistema.**

## 5. El desenlace

En cuestión de minutos tras la aprobación, el atacante tenía acceso a
los canales internos de **Slack**, la **VPN** y los **repositorios de
código fuente** de Uber. La empresa se enteró del ataque cuando el
propio intruso publicó un mensaje en el canal general de Slack, visible
para toda la compañía.

## 🛡️ Cómo protegerte de esto

- Configura MFA que exija **un código o número que coincida** (number
  matching), no solo un botón de "Aprobar/Denegar" — dificulta mucho la
  aprobación accidental por cansancio.
- Establece un **límite de intentos** que bloquee la cuenta tras
  demasiadas solicitudes de MFA en poco tiempo, en vez de permitir un
  bombardeo indefinido.
- Cualquier contacto "de soporte de IT" pidiendo que apruebes algo debe
  verificarse por un canal independiente — nunca confíes en el canal que
  te contacta primero.
