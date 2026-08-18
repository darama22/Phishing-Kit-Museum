# MGM Resorts 2023 — disección

> 📚 Caso real, con análisis técnico de **Netwrix, Specops y Virsec**, y
> cobertura de The Register sobre el grupo Scattered Spider:
> [specopssoft.com/blog/mgm-resorts-service-desk-hack](https://specopssoft.com/blog/mgm-resorts-service-desk-hack/).
> Reconstrucción educativa del guion de llamada — sin ninguna herramienta
> real de restablecimiento de contraseñas.

## El giro que distingue esta sala de la de Twitter 2020

Ambas salas usan **vishing** (phishing por teléfono). Pero hay una
diferencia clave: en Twitter, los atacantes llamaron **al empleado**. En
MGM, llamaron **al helpdesk**, haciéndose pasar por el empleado —
atacando a la gente cuyo trabajo es literalmente *ayudar rápido*, no
sospechar.

## 1. La investigación previa — `original/linkedin_recon_notes.txt`

Antes de marcar un número, los atacantes de "Scattered Spider"
investigaron en **LinkedIn** a empleados senior de MGM Resorts —
buscando a alguien con privilegios altos cuyo nombre, cargo y detalles
básicos pudieran citar con naturalidad durante la llamada.

## 2. La llamada — `original/index.html`

Con esa información, llamaron al **servicio de soporte técnico interno**
y pidieron, verbalmente, el **restablecimiento del número de teléfono /
credenciales** de ese empleado de alto perfil — alegando problemas de
acceso. Hablaban un inglés fluido y nativo, lo que reforzaba la
credibilidad frente al personal de soporte.

## 3. Por qué el helpdesk es un objetivo tan efectivo

El trabajo del helpdesk es **resolver problemas rápido**, no interrogar a
quien llama. Verificar la identidad de alguien que suena convincente y
que menciona detalles reales (obtenidos por OSINT) es mucho más difícil
que detectar un email con un enlace sospechoso.

## 4. Dentro — de una llamada a control total

Con el restablecimiento concedido, los atacantes obtuvieron acceso al
entorno **Okta** de MGM con privilegios de **super-administrador**,
permitiéndoles iniciar sesión de forma no autorizada en **Microsoft
Azure** y más de **100 hipervisores ESXi**. Crearon además una segunda
aplicación de identidad bajo su control, como plan de respaldo por si
perdían el acceso inicial.

## 5. El desenlace

Máquinas tragaperras fuera de servicio, llaves digitales de habitaciones
inutilizadas, sistemas de reservas caídos durante días. El grupo de
ransomware **ALPHV/BlackCat** cifró sistemas después de la intrusión
inicial, y Scattered Spider afirmó haber robado 6 terabytes de datos.

## 🛡️ Cómo se protege una organización de esto

- **Verificación robusta en el helpdesk**: cualquier restablecimiento de
  cuentas con privilegios elevados debe requerir verificación por un
  canal independiente (videollamada con cámara, aprobación de un
  responsable), nunca solo "sonar convincente" por teléfono.
- Entrena específicamente al **personal de soporte técnico** contra
  ingeniería social — son un objetivo de alto valor precisamente porque
  su trabajo es ayudar rápido.
- Aplica el principio de **privilegio mínimo**: que un solo
  restablecimiento nunca pueda derivar en privilegios de
  super-administrador sin pasos adicionales.
