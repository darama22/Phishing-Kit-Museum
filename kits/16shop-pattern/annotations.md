# 16Shop — disección

> 📚 Basado en la investigación pública de **Trend Micro**, en colaboración
> con **Interpol**: [trendmicro.com — Revisiting 16shop Phishing Kit](https://www.trendmicro.com/en_us/research/23/i/revisiting-16shop-phishing-kit-trend-interpol-partnership.html).
> Caso real con **detenciones confirmadas**. El código de este kit es una
> **reconstrucción educativa** del panel documentado, no el kit original.

## El salto de nivel: de "un script" a "un negocio"

Las salas anteriores mostraban kits sueltos, hechos por un atacante para sí
mismo. **16Shop es otra cosa: un producto comercial.** Activo desde 2018,
se vendía a otros criminales como *phishing-as-a-service* — no necesitabas
saber programar, solo comprar acceso al panel.

## 1. El panel — `original/panel_config.php`

El comprador entraba a un panel de administración y elegía:
- **Qué marca suplantar**: Apple, Amazon, PayPal, DHL, American Express...
- **Precio distinto por marca** — American Express era la opción más cara,
  probablemente porque sus titulares de tarjeta "premium" son un objetivo
  más rentable para el atacante.
- **Idioma del mensaje**, según el país donde se fuera a distribuir.

Con esa elección, el panel generaba automáticamente el paquete de phishing
listo para desplegar — el comprador solo tenía que subirlo a un servidor.

## 2. Multi-idioma por configuración — `original/verify.ini`

En vez de programar una web distinta por idioma, el kit usa un archivo de
configuración (`verify.ini`) con los textos ya traducidos. Cambiar de
"ataca a víctimas en España" a "ataca a víctimas en Japón" era tan simple
como cambiar un parámetro, no reescribir código.

## 3. Protección anti-piratería (entre los propios criminales)

Un detalle curioso: el kit incluía una **licencia atada a la máquina** del
comprador — el propio creador del kit protegía su "producto" para que otros
criminales no lo copiaran gratis. Fraude protegiendo fraude.

## 4. El final — cómo cae un imperio de phishing

En 2021, año de mayor actividad de 16Shop, uno de sus administradores
principales fue **detenido**, en una operación conjunta de la policía de
Indonesia, Japón e **Interpol**, con apoyo técnico de Trend Micro. Tras esa
detención (y arrestos posteriores de seguimiento), 16Shop dejó de operar.

## 🛡️ Por qué importa este caso

Demuestra que el phishing moderno **no siempre lo monta un solo atacante
técnico** — hay toda una industria de "proveedores" que venden el kit a
terceros menos capaces. Y también demuestra que **estos casos se resuelven**:
la colaboración entre investigadores privados y policía internacional
consigue detenciones reales.
