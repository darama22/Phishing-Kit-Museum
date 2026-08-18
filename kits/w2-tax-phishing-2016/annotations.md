# El phishing de temporada de impuestos — disección

> 📚 Patrón real, con alerta oficial del **IRS (Security Summit)** e
> investigación de **Brian Krebs**:
> [krebsonsecurity.com](https://krebsonsecurity.com/2017/02/irs-scam-blends-ceo-fraud-w-2-phishing/).
> Reconstrucción educativa del email — con nombres y empresa ficticios.

## La misma estafa BEC, apuntando a otra puerta

Ya viste en el museo el BEC clásico dirigido a **Finanzas** (Rimasauskas,
Ubiquiti). Esta sala muestra la variante que descubrió una puerta
distinta e igual de efectiva: **RRHH/nóminas**, un departamento que en
2016 casi nadie había entrenado contra este tipo de fraude.

## 1. El objetivo — no dinero, datos fiscales de TODOS

El email, suplantando al CEO o CFO real de la empresa, no pedía una
transferencia bancaria — pedía **los formularios W-2** de todos los
empleados: nombre, número de la Seguridad Social, dirección, salario del
año. Con eso, un atacante puede presentar declaraciones de la renta
fraudulentas a nombre de **cada empleado**, de golpe.

## 2. El cebo — `original/index.html`

El cronometraje era la clave: el email llegaba en pleno **enero/febrero**,
justo cuando pedir el W-2 a nóminas es una petición **completamente
normal y esperada** en cualquier empresa — nada que levante sospechas por
sí solo.

## 3. Por qué RRHH y no Finanzas

En 2016, la mayoría de la formación contra el fraude BEC se centraba en
el departamento financiero — "cuidado con peticiones de transferencias".
Nadie había pensado en entrenar a nóminas contra peticiones de
**documentos**, no de dinero. Los estafadores encontraron el punto ciego.

## 4. El desenlace — una epidemia, no un caso aislado

El IRS recibió **más de 1.000 reportes** solo en enero de 2016, con un
aumento del **400%** interanual en la primera mitad de esa temporada.
Empresas conocidas afectadas incluyeron Seagate Technology, Moneytree y
Sprouts Farmers Market. El patrón se extendió después a distritos
escolares, casinos tribales y cadenas de restaurantes — y en algunos
casos, tras obtener los W-2, los estafadores enviaban una **segunda
petición** pidiendo también una transferencia bancaria.

## 🛡️ Cómo se protege una organización de esto

- Entrena a **todos los departamentos con acceso a datos sensibles**
  (RRHH, nóminas, legal), no solo a Finanzas — cualquier departamento
  puede ser el objetivo elegido.
- Establece que **ninguna petición masiva de datos de empleados** se
  procese sin verificación por un canal independiente, por mucho que
  parezca venir del CEO.
- Si tu empresa sufre esto, notifica de inmediato al **IRS** (o la
  autoridad fiscal correspondiente) — la rapidez de aviso ayuda a mitigar
  el fraude fiscal derivado.
