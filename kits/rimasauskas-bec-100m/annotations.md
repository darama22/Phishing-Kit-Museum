# El hombre que estafó $100 millones a Google y Facebook — disección

> 📚 Caso real, documentado por el **Departamento de Justicia de EE.UU.**
> (cargos, declaración de culpabilidad y sentencia), con cobertura de
> BleepingComputer, CNBC y NPR:
> [bleepingcomputer.com](https://www.bleepingcomputer.com/news/security/lithuanian-pleads-guilty-to-stealing-100-million-from-google-facebook/) ·
> [npr.org](https://www.npr.org/2019/03/25/706715377/). Los documentos de
> esta sala son una **reconstrucción educativa**, con empresa y cifras
> ficticias — no se reproduce ningún documento real del caso.

## Por qué esta sala no se parece a ninguna otra

No hay HTML clonado. No hay JavaScript capturando contraseñas. **Este es el
phishing más caro del museo, y no necesitó ni una línea de código** — solo
papeleo perfectamente falsificado y mucha paciencia. Se llama **BEC**
(*Business Email Compromise*, compromiso de correo corporativo).

## 1. El montaje — una empresa de mentira, pero registrada de verdad

Evaldas Rimasauskas no creó una web falsa: **registró legalmente una
empresa** con el mismo nombre que un fabricante de hardware real que ya
trabajaba con Google y Facebook (Quanta Computer). No era un dominio
parecido — era una compañía de verdad, con papeles de verdad, que
simplemente **no era quien decía ser**.

## 2. El cebo — `original/fake_invoice.html`

Con esa empresa como fachada, envió **facturas falsificadas** a empleados
concretos de los departamentos de pagos de Google y Facebook — exactamente
el tipo de factura que esas empresas ya esperaban recibir de ese proveedor,
por el importe correcto, con la referencia correcta.

## 3. El detalle que lo hace brillante (y aterrador)

No se quedó en la factura. Fabricó:
- **Contratos** con firmas falsificadas de directivos reales.
- **Cartas** que parecían proceder de agentes legítimos de las empresas.
- **Sellos corporativos falsos**, grabados con los nombres reales de Google
  y Facebook y del proveedor suplantado — pensados específicamente para
  que la documentación superara los controles internos de los bancos al
  procesar transferencias tan grandes.

## 4. Por qué funcionó durante casi dos años (2013-2015)

Cada elemento por separado era creíble: una empresa real, facturas con el
importe esperado, contratos con la firma "correcta". Los empleados que
aprobaban los pagos no tenían motivo para dudar — todo encajaba con lo que
ya sabían sobre su relación con ese proveedor.

## 5. La fuga — `original/spoofed_wire_instructions.txt`

El "robo" en este caso no es un formulario capturando una contraseña: es
la propia **transferencia bancaria**, que las víctimas autorizan
voluntariamente creyendo que pagan a su proveedor real, cuando el dinero
va a cuentas controladas por el estafador — repartidas en varios países
para dificultar el rastreo.

## 6. El desenlace

Rimasauskas defraudó **~23 millones de dólares a Google** y
**~99 millones a Facebook**. Se declaró culpable de fraude electrónico,
robo de identidad agravado y blanqueo de capitales; fue condenado a
**5 años de prisión**, con orden de decomisar cerca de 50 millones de
dólares y pagar más de 26 millones en restitución. Google recuperó todo su
dinero; Facebook, la mayor parte.

## 🛡️ Cómo se protege una empresa de esto

- **Verificación por un canal distinto**: cualquier cambio de cuenta
  bancaria de un proveedor debe confirmarse por teléfono, con un número ya
  conocido — nunca con el que aparece en el propio email.
- **Doble aprobación** obligatoria para transferencias grandes, con
  personas distintas verificando cada parte.
- Desconfiar de la "urgencia" — los estafadores BEC suelen presionar con
  plazos ajustados para que no dé tiempo a verificar con calma.
