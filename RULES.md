# Reglas del proyecto — no negociables

Este museo diseca kits de phishing con fines **educativos y de concienciación**.
Para que siga siendo eso y no otra cosa, dos reglas se cumplen SIEMPRE:

## 1. Cero datos de víctimas reales

Un kit de phishing capturado en el mundo real puede traer un archivo con
credenciales de gente que ya picó (`log.txt`, `pass.txt`, correos enviados a un
buzón de exfiltración, etc.). **Eso no entra en el repo bajo ningún concepto.**

Antes de meter cualquier kit:
- Se escanea buscando archivos de logs/credenciales/emails capturados.
- Se eliminan por completo (no se "anonimizan", se BORRAN).
- Si un kit no se puede limpiar con garantías, no se incluye. Punto.

## 2. Kits "defang-eados" (desactivados), nunca funcionales

Cada kit se modifica antes de subirse para que **no pueda robar nada** si alguien
lo despliega:
- Se elimina o inutiliza el backend que captura credenciales (el PHP/JS que
  envía los datos a algún sitio).
- Se elimina cualquier endpoint de exfiltración (webhook, bot de Telegram,
  dirección de email del atacante).
- Lo que queda es el HTML/CSS de la "máscara" (el clon visual) y comentarios
  explicando la técnica — no el arma completa.

Si alguna vez dudas si un kit cumple esto: no lo subas y pregúntame primero.
