# La estafa de soporte técnico — disección

> 📚 Patrón real, documentado por el **FBI (IC3)** y la **FTC**:
> [fbi.gov](https://www.fbi.gov/how-we-can-help-you/scams-and-safety/common-frauds-and-scams/tech-support-scams) ·
> [consumer.ftc.gov](https://consumer.ftc.gov/articles/how-spot-avoid-and-report-tech-support-scams).
> Reconstrucción educativa de la pantalla de bloqueo — sin ningún
> software de acceso remoto real instalado.

## La sala que invierte la dirección de todo el museo

En cada sala anterior, el atacante contacta a la víctima: un email, una
llamada, un SMS. Aquí es al revés: la propia víctima, presa del pánico,
**llama al atacante**. Ese giro es lo que hace tan eficaz esta estafa.

## 1. El cebo — `original/index.html`

Mientras navegas con normalidad, aparece una ventana emergente a
pantalla completa: *"ALERTA DE SEGURIDAD — su equipo está infectado"*,
con el logo de Windows, sonidos de alarma, y un número de teléfono de
"soporte técnico" bien visible. La ventana está diseñada para ser
**difícil de cerrar** — cuantos más intentos de cerrarla fallen, más
sube el pánico.

## 2. La primera señal de alarma que casi nadie conoce

**Ni Microsoft ni Apple muestran jamás un número de teléfono** en
ninguna alerta real del sistema. Es, por sí solo, el indicador más
fiable de que la alerta es falsa — y sin embargo, casi nadie lo sabe.

## 3. La llamada — de víctima a cómplice involuntario

Al llamar, un "técnico" muy convincente atiende. Pide instalar un
programa de **acceso remoto legítimo** (herramientas reales usadas a
diario por soporte técnico de verdad) para "diagnosticar" el problema.
La víctima, aliviada de que alguien se haga cargo, lo instala ella
misma.

## 4. Dentro del equipo — el "diagnóstico" es el verdadero ataque

Con acceso remoto concedido, el falso técnico ejecuta un "escaneo" que
siempre encuentra problemas graves (inventados), y ofrece "solucionarlos"
a cambio de un pago — a veces cientos o miles de dólares. En los casos
más graves, aprovecha el acceso para robar credenciales bancarias reales
o instalar malware de verdad.

## 5. El desenlace — y quién sufre más

Solo en 2023, la FTC estimó **924 millones de dólares** en pérdidas en
EE.UU. El FBI recibió **19.000 denuncias** solo en la primera mitad de
ese año, con más de **542 millones** en pérdidas. Casi la mitad de las
víctimas reportadas al FBI tenían **más de 60 años** — y representaban
el **66%** de las pérdidas totales.

## 🛡️ Cómo protegerte de esto

- **Ningún sistema operativo real muestra un número de teléfono** en sus
  alertas de seguridad — si lo ves, es una estafa, sin excepción.
- Si una ventana "no te deja" cerrarla con normalidad, no llames a ningún
  número: cierra el navegador entero (o reinicia el equipo si hace
  falta) en vez de interactuar con la ventana.
- Nunca instales software de acceso remoto a petición de alguien que te
  llamó a ti o a quien tú llamaste tras ver una alerta — solo hazlo con
  soporte técnico que **tú** contactaste de forma independiente y
  verificada.
