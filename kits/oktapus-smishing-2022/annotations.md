# 0ktapus — disección

> 📚 Caso real, documentado por **Group-IB** ("Roasting 0ktapus") y
> confirmado oficialmente por Okta bajo el nombre "Scatter Swine":
> [group-ib.com/blog/0ktapus](https://www.group-ib.com/blog/0ktapus/) ·
> [sec.okta.com/articles/scatterswine](https://sec.okta.com/articles/scatterswine/).
> Reconstrucción educativa — el relevo de MFA se queda siempre en un log
> local.

## El vector que casi nadie vigila

Las empresas entrenan a su plantilla contra el phishing por **email**.
Muy pocas entrenan contra el mismo ataque por **SMS**. 0ktapus explotó
exactamente ese punto ciego, a escala industrial: 136 empresas, casi
10.000 credenciales.

## 1. El cebo — un SMS, no un email

La víctima recibía un mensaje de texto, normalmente con una excusa de
"tu sesión ha caducado, verifica tu acceso" y un enlace. Nada de spam ni
enlaces raros en el correo — un canal completamente distinto al que
vigilan los filtros de seguridad corporativos.

## 2. La máscara personalizada — `original/index.html`

Cada web falsa se generaba **a medida de la empresa objetivo**: mismo
logo, mismo nombre, un dominio que se parecía al portal real de Okta de
esa organización. Nada de una plantilla genérica — cada víctima veía "su"
empresa.

## 3. La trampa en dos pasos — `original/relay.php`

Aquí está la parte más peligrosa: el kit no se conformaba con la
contraseña. Tras capturarla, **pedía también el código MFA** que la
víctima recibía por SMS de su sistema real — y lo reenviaba a los
atacantes **en tiempo real**, antes de que ese código caducara (suelen
durar solo unos minutos). Con contraseña + código válido, los atacantes
entraban directamente en el sistema real, MFA incluido.

## 4. El efecto cadena — cuando la víctima es también un proveedor

El acceso obtenido a **Twilio** (proveedor de servicios SMS) permitió a
los atacantes, en campañas posteriores, **interceptar códigos SMS
destinados a otras víctimas** — convirtiendo una brecha en la
infraestructura para la siguiente ronda de ataques.

## 5. El desenlace

**136 organizaciones** comprometidas, casi **10.000 credenciales de
empleados** robadas, mayoritariamente empresas de tecnología, software y
servicios cloud — Twilio, Cloudflare, MailChimp y Klaviyo entre ellas.

## 🛡️ Cómo protegerte de esto

- Entrena contra el phishing por **SMS igual que por email** — el canal
  cambia, la manipulación es la misma.
- Prefiere MFA que **no dependa de un código copiable** (llaves físicas
  FIDO2/passkeys) — un código SMS siempre se puede relevar en tiempo real.
- Desconfía de mensajes de texto con enlaces de login, aunque el dominio
  parezca correcto a primera vista.
