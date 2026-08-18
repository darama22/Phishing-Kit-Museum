# El gusano de Google Docs — disección

> 📚 Caso real, documentado técnicamente por **Netskope** ("CloudPhishing
> worm") y cubierto por BankInfoSecurity y SANS ISC:
> [bankinfosecurity.com](https://www.bankinfosecurity.com/attackers-unleash-oauth-worm-via-google-docs-app-a-9888) ·
> [netskope.com](https://www.netskope.com/blog/google-doc-cloudphishing-worm-attack-technical-analysis).
> Esta sala reconstruye la pantalla de consentimiento OAuth — no es una
> app real ni se conecta a ninguna cuenta de Google.

## La sala que rompe todas las reglas del museo

Hasta ahora, cada sala tenía algo en común: **una web falsa pidiendo una
contraseña.** Esta no. Aquí la víctima **nunca escribe nada** en ningún
sitio falso — entra a la página *real* de Google, inicia sesión de
verdad, y el robo ocurre de todos modos. Por eso este caso asustó tanto
al sector.

## 1. El cebo — un enlace 100% legítimo

La víctima recibía un email pareciendo una invitación normal de Google
Docs: *"fulanito ha compartido un documento contigo"*. Al hacer clic, el
enlace llevaba de verdad a `accounts.google.com` — el dominio real de
Google, sin ninguna falsificación.

## 2. La trampa — `original/oauth_consent.html`

Ahí, en la página auténtica, Google preguntaba si querías dar permiso a
una app llamada **"Google Docs"** para acceder a tu cuenta. El fallo:
Google **no verificaba** que el nombre "Google Docs" fuera realmente de
Google — cualquiera podía registrar una app de terceros con ese mismo
nombre y el logo real, y la pantalla de consentimiento se veía
indistinguible de una petición legítima.

## 3. Por qué esto es más peligroso que robar una contraseña

Al pulsar "Permitir", la víctima **no entregaba su contraseña** — le daba
a la app maliciosa un **token OAuth** con permiso para leer, enviar,
borrar y gestionar su correo, sin necesitar la contraseña en absoluto. Un
cambio de contraseña posterior **no habría revocado ese acceso**.

## 4. El gusano — por qué se propagó tan rápido

En cuanto la víctima concedía el permiso, la propia app **leía su lista
de contactos** y se reenviaba automáticamente a todos ellos — sin que el
atacante tuviera que enviar un solo email más a mano. Cada nueva víctima
se convertía, sin saberlo, en el siguiente punto de propagación.

## 5. El desenlace — la respuesta más rápida del museo

El primer email malicioso se envió a las 14:27 (hora del Este de EE.UU.).
En **poco más de una hora**, Google había detectado el patrón, revocado
el token de la app maliciosa a nivel de plataforma y frenado la
propagación. Aun así, se estima que hasta **1 millón de cuentas**
llegaron a autorizar la app en esa ventana de tiempo.

## 🛡️ Cómo protegerte de esto

- Revisa periódicamente qué **apps de terceros** tienen acceso concedido
  a tu cuenta de Google/Microsoft (en la configuración de seguridad de tu
  cuenta) y revoca las que no reconozcas.
- Antes de pulsar "Permitir" en una pantalla de consentimiento, mira con
  atención **qué permisos pide** — leer/enviar/borrar correo es
  desproporcionado para "ver un documento".
- Un dominio 100% legítimo en la barra de direcciones **no garantiza**
  que lo que te pidan a continuación sea seguro.
