# Operation Phish Phry — disección

> 📚 Caso real, documentado oficialmente por el **FBI**:
> [fbi.gov — Operation 'Phish Phry'](https://www.fbi.gov/news/stories/2009/october/phishphry_100709).
> En su momento, la mayor causa de cibercrimen jamás presentada: **100
> acusados** entre EE.UU. y Egipto. Los archivos de esta sala son una
> **reconstrucción educativa** del mecanismo, sin cuentas ni datos reales.

## Por qué esta sala completa el museo

Todas las salas anteriores explican **cómo se roba** una credencial.
Esta explica lo que casi ninguna otra cuenta: **qué pasa con el dinero
después.** El phishing bancario no termina cuando alguien escribe su
contraseña en una web falsa — ahí es solo donde empieza la segunda mitad
del crimen.

## 1. La captura — `original/fake_bank_login.html`

Como en la sala "Phish in a Barrel", todo arranca con un email masivo y
una web bancaria clonada. Nada nuevo técnicamente — lo interesante viene
después.

## 2. La división del trabajo — dos países, dos roles

La operación estaba organizada en dos grupos que **nunca veían el
proceso completo**:
- En **Egipto**, un grupo hackeaba las cuentas bancarias y capturaba las
  credenciales.
- En **Estados Unidos**, otro grupo recibía esas credenciales y se
  encargaba de **sacar el dinero real** de los bancos estadounidenses.

Esta separación no es casual: si detienen a alguien de un lado, ese
alguien no puede delatar al otro lado, porque ni siquiera sabe cómo
funciona.

## 3. Las "mulas de dinero" — `original/mule_recruitment_flyer.txt`

La pieza más importante del engranaje: los **runners**. Gente reclutada
(a veces sin saber del todo en qué se estaban metiendo) para abrir cuentas
bancarias reales **a su propio nombre**. El dinero robado se transfería
ahí primero — y luego esas personas lo retiraban en efectivo o lo
reenviaban, a cambio de una comisión.

**Por qué funciona:** un banco ve una transferencia entre dos cuentas
"normales" de clientes reales, no un robo directo — mucho más difícil de
detectar y frenar a tiempo.

## 4. El tramo final — de vuelta a Egipto

El dinero que llegaba a las cuentas de las mulas se **fragmentaba** en
cantidades más pequeñas y se enviaba por servicios de transferencia
internacional de vuelta hacia Egipto — troceado precisamente para no
disparar las alertas bancarias por movimientos grandes.

## 5. El desenlace

Investigación conjunta del **FBI** y las autoridades egipcias: **53
acusados en EE.UU. y 47 en Egipto**, con pérdidas estimadas superiores al
millón y medio de dólares. Varios de los cabecillas fueron condenados a
penas de hasta 13 años de prisión.

## 🛡️ Por qué este caso importa especialmente

Enseña que combatir el phishing no es solo "detectar la web falsa" — hay
toda una economía criminal organizada detrás, con roles especializados,
fronteras que dificultan la persecución legal, y una capa de blanqueo
diseñada específicamente para que el dinero (y la responsabilidad) se
vuelvan casi imposibles de rastrear hasta el origen.
