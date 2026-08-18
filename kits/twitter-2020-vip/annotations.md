# El hackeo de Twitter 2020 — disección

> 📚 Caso real, documentado en el informe oficial del **Departamento de
> Servicios Financieros del Estado de Nueva York**:
> [dfs.ny.gov/Twitter_Report](https://www.dfs.ny.gov/Twitter_Report).
> Los archivos de esta sala son una **reconstrucción educativa** del
> mecanismo — sin herramientas ni credenciales reales de Twitter.

## Por qué esta sala rompe el patrón de todas las demás

En ninguna otra sala del museo hay una web falsa, un email, ni una
factura. Aquí el "kit" es **una llamada de teléfono**. Y con eso bastó
para secuestrar las cuentas de Barack Obama, Elon Musk, Bill Gates y Kim
Kardashian en la misma tarde.

## 1. El objetivo — no las cuentas, los empleados

Los atacantes no intentaron adivinar contraseñas de famosos. Fueron a por
el eslabón con más poder y menos vigilancia: **empleados de Twitter con
acceso a herramientas administrativas internas**, capaces de gestionar
cualquier cuenta de la plataforma.

## 2. El cebo — `original/vishing_script.txt`

*Vishing* = *voice phishing*, phishing por teléfono. Los atacantes
llamaron a empleados haciéndose pasar por el **departamento de IT
interno**, con una excusa creíble (un problema con la VPN corporativa, o
similar) para conseguir que el empleado introdujera sus credenciales en
una página que el atacante controlaba, o las revelara directamente.

## 3. Por qué es tan difícil de entrenar frente a esto

Todo el mundo aprende a desconfiar de "un enlace raro en un email". Pocas
empresas entrenan a su plantilla para desconfiar de **una llamada de voz
convincente que suena exactamente a soporte técnico interno de verdad**.
Es el mismo principio de ingeniería social que las otras salas, pero
atacando un canal de confianza distinto.

## 4. La herramienta administrativa — `original/fake_admin_panel.php`

Con las credenciales de un empleado con los permisos adecuados, los
atacantes accedieron a un **panel de administración interno** legítimo de
Twitter — no tuvieron que "hackear" cuenta por cuenta: la propia
herramienta de la empresa les daba control directo sobre cualquier
cuenta.

## 5. El desenlace — 130 cuentas, 45 usadas, un adolescente

**130 cuentas de alto perfil** quedaron comprometidas; **45** se usaron
para publicar el mismo mensaje: una supuesta promoción de Bitcoin
("envía dinero y te lo devolvemos duplicado"). En pocas horas, la estafa
recaudó más de **118.000 dólares**. Entre los responsables detenidos
había un joven de **17 años**.

## 🛡️ Cómo se protege una organización de esto

- **Verificación fuera de banda**: cualquier petición de credenciales
  "por parte de IT" debe verificarse por un canal distinto (llamar de
  vuelta a un número interno conocido, nunca al que llama).
- **Principio de mínimo privilegio**: ningún empleado individual debería
  poder acceder a *cualquier* cuenta de alto perfil sin controles
  adicionales (aprobación de varias personas, alertas automáticas).
- Entrenar contra el vishing con la misma seriedad que contra el phishing
  por email — el canal cambia, la manipulación psicológica es la misma.
