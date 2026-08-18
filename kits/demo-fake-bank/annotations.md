# SecureBank Demo — disección

> ⚠️ Kit **ficticio y desactivado**, escrito por el proyecto como plantilla de
> formato. Marca inventada, sin víctimas reales, sin backend funcional. Sirve
> para enseñar cómo se lee/anota un kit real cuando lo añadas.

## 1. La máscara — `original/index.html` + `style.css`

El HTML clona el aspecto de una web de banca (logo, colores, tipografía) para
que la víctima no dude ni un segundo de que es la web real. Los kits reales
suelen copiar literalmente el HTML/CSS de la página original con `curl`/`wget`
y solo tocan el formulario de login.

**Detalle clave:** la URL del navegador es lo único que delata al kit — por
eso muchos usan dominios que se parecen mucho al real (`secure-bank-login.com`
en vez de `securebank.com`) o subdominios de servicios gratuitos.

## 2. La trampa — `original/capture.js`

Aquí es donde ocurre el robo. El script:
1. Intercepta el `submit` del formulario **antes** de que se envíe a ningún
   sitio real.
2. Lee usuario y contraseña de los campos.
3. **(En un kit real)** los envía a un servidor del atacante vía `fetch()`/
   `POST` — en este demo esa línea está **comentada y sustituida por un
   `console.log`**, para que quede claro dónde estaría el robo sin que el
   archivo haga nada.
4. Redirige a la víctima a la web bancaria REAL, para que piense que solo
   falló el login una vez y no sospeche.

## 3. La fuga — dónde van los datos (en un kit real)

Los kits reales rara vez usan un servidor propio "serio": suelen mandar los
datos capturados a:
- Un **bot de Telegram** (instantáneo, difícil de rastrear).
- Un **email** a una cuenta desechable.
- Un archivo `log.txt` en el propio hosting comprometido (el más torpe, y el
  que **NUNCA** se sube a este museo — ver RULES.md).

## 4. La evasión — cómo se esconden

- Comprueban el **User-Agent**: si detectan un bot de seguridad (Google
  Safe Browsing, escáneres automáticos), muestran una página en blanco o un
  error 404 en vez del phishing — así el escáner no lo detecta como malicioso.
- Algunos comprueban la **IP** y solo muestran el kit a direcciones de la
  región donde viven las víctimas objetivo.
- Ofuscan el nombre de los campos del formulario (`fldA`, `fldB` en vez de
  `usuario`, `password`) para dificultar el análisis automático.

## 🛡️ Cómo protegerte (la parte que importa)

- Nunca escribas tu contraseña tras llegar por un enlace de email/SMS —
  entra siempre escribiendo la URL tú mismo o desde tu app oficial.
- Mira la URL exacta, letra a letra.
- Activa verificación en dos pasos — aunque te roben la contraseña, no podrán
  entrar sin el segundo factor.
