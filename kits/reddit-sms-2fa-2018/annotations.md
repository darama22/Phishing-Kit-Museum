# Reddit 2018 — interceptación de SMS — disección

> 📚 Caso real, con comunicado oficial de Reddit y análisis técnico de
> **Krebs on Security**:
> [krebsonsecurity.com](https://krebsonsecurity.com/2018/08/reddit-breach-highlights-limits-of-sms-based-authentication/).
> Reconstrucción educativa del concepto — sin ninguna manipulación real de
> operadores telefónicos.

## La sala que demuestra que "tener 2FA" no es garantía

Reddit **tenía** autenticación de dos factores activada en las cuentas de
sus empleados. Y aun así sufrieron una brecha. Esta sala explica por qué
el **tipo** de 2FA importa tanto como tenerlo o no.

## 1. El objetivo no fue la contraseña

A diferencia de casi todas las demás salas, aquí el problema no estuvo en
robar una contraseña — probablemente ya estaba comprometida por otra vía.
El objetivo específico fue el **segundo factor**: el código de un solo
uso enviado por SMS.

## 2. Cómo se intercepta un SMS sin tocar el teléfono

El propio Reddit admitió no saber (o no revelar) el método exacto. Pero
los expertos en seguridad señalan la técnica más probable: el
**SIM swap** — convencer al operador de telefonía de la víctima,
mediante ingeniería social, de que transfiera su número a una tarjeta SIM
controlada por el atacante. Desde ese momento, todos los SMS —incluidos
los códigos de verificación— llegan directamente al atacante.

## 3. Por qué esto es tan difícil de defender para la propia víctima

El teléfono de la víctima **nunca fue hackeado**. La manipulación ocurrió
enteramente del lado del **operador de telefonía**, un sistema totalmente
fuera del control de la persona afectada. No hay ningún antivirus ni
buena práctica personal que blinde contra esto por completo.

## 4. La ironía central del caso

El 2FA por SMS existe precisamente para **añadir** seguridad más allá de
la contraseña. Aquí, ese segundo factor resultó ser el **eslabón más
débil** de toda la cadena — mientras las contraseñas de los empleados
seguían perfectamente protegidas.

## 5. El desenlace

Los atacantes accedieron a código fuente, logs internos, archivos de
configuración, y una **copia de seguridad de 2005-2007** con nombres de
usuario, contraseñas cifradas, emails y mensajes privados de aquella
época. Reddit respondió exigiendo **2FA basado en tokens físicos o apps
de autenticación**, nunca SMS, para todos sus empleados.

## 🛡️ Cómo protegerte de esto

- Evita el 2FA por SMS cuando tengas alternativa: usa **apps de
  autenticación** (Google Authenticator, Authy) o, mejor aún, **llaves
  físicas FIDO2/passkeys** — ninguna de las dos depende de tu operador de
  telefonía.
- Pregunta a tu operador móvil si ofrece un **PIN o contraseña adicional**
  para cualquier cambio o portabilidad de tu número — es tu principal
  defensa contra el SIM swap.
- Si tu teléfono pierde cobertura de repente sin motivo aparente,
  **actúa rápido** — puede ser la primera señal de un SIM swap en curso.
