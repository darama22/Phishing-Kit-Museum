# Quishing — el phishing en pegatina — disección

> 📚 Patrón documentado en alertas públicas del **FBI (IC3)** sobre
> parquímetros y cargadores eléctricos, con datos de crecimiento
> recogidos por Synovus y DeepStrike. Reconstrucción educativa — sin
> ningún código QR real que apunte a un sitio externo.

## La sala que sale de la pantalla

Cada sala del museo hasta ahora vivía dentro de un email, una llamada o
un navegador. Esta es la primera que **existe en el mundo físico**: una
simple pegatina de papel, pegada sobre un parquímetro, en la calle.

## 1. El cebo — ni siquiera hace falta hackear nada

El "ataque" técnico es asombrosamente simple: alguien **imprime una
pegatina** con un código QR falso y la pega **encima** del código QR
legítimo del parquímetro o cargador eléctrico. No hay ningún sistema que
comprometer — solo una impresora y pegamento.

## 2. Por qué un QR es más peligroso que un enlace de texto

Un enlace escrito lo puedes **leer** antes de hacer clic — puedes notar
que algo no encaja en el dominio. Un código QR es, por diseño, **opaco al
ojo humano**: nadie puede "leer" a simple vista a dónde lleva un QR antes
de escanearlo. La desconfianza que aplicarías a un enlace sospechoso
simplemente no tiene ocasión de activarse.

## 3. La trampa — `original/index.html`

Al escanear, la víctima llega a una web que **imita el portal oficial de
pago de aparcamiento** de su ciudad — con el mismo aspecto y la misma
urgencia ("paga ahora o recibirás una multa"). Introduce los datos de su
tarjeta, creyendo que está pagando una hora de parking.

## 4. Por qué esquiva las defensas corporativas

Muchas empresas escanean automáticamente los enlaces de texto que llegan
por email o mensajería en busca de phishing. Pero un enlace **incrustado
dentro de una imagen** (el propio código QR) es mucho más difícil de
analizar automáticamente — el quishing se cuela precisamente por ese
punto ciego.

## 5. El desenlace — un crecimiento explosivo

El quishing pasó de ser una anécdota (0,8% de los ataques de phishing en
2021) a un **12,4%** en 2023, con un crecimiento reportado del **587%**
entre 2023 y 2024. Policías de varias ciudades de EE.UU. y Reino Unido
han tenido que retirar físicamente pegatinas fraudulentas de
parquímetros reales.

## 🛡️ Cómo protegerte de esto

- Antes de escanear un QR en la calle, **comprueba visualmente** si
  parece una pegatina añadida encima de otra cosa (bordes, desalineación,
  tipo de papel distinto).
- Muchos móviles muestran la **URL de destino antes de abrir el enlace**
  al escanear — léela con la misma atención que un enlace de email.
- Para pagos de aparcamiento, prefiere la **app oficial** de tu ciudad o
  escribe la URL tú mismo, en vez de escanear un QR de un poste en la
  calle.
