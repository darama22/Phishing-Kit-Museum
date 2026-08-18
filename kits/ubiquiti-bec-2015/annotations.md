# Ubiquiti Networks — 46,7 millones sin hackear nada — disección

> 📚 Investigación de **Brian Krebs (KrebsOnSecurity)** y el propio informe
> 8-K que Ubiquiti presentó ante la SEC de EE.UU.:
> [krebsonsecurity.com](https://krebsonsecurity.com/2015/08/tech-firm-ubiquiti-suffers-46m-cyberheist/).
> Reconstrucción educativa de los emails — con nombres y empresas
> ficticios.

## Comparado con la sala de Google/Facebook: la otra forma de hacer BEC

Ya viste en otra sala del museo cómo Evaldas Rimasauskas robó 100
millones registrando una **empresa falsa de verdad**. Ubiquiti es la
variante más simple y aun así igual de efectiva: **ni siquiera hizo
falta montar una empresa** — bastó con suplantar por email a gente que
la víctima ya conocía y en la que ya confiaba.

## 1. El cebo — dos suplantaciones, no una

Los estafadores enviaron emails haciéndose pasar por **dos fuentes de
autoridad distintas**: el propio **CEO** de Ubiquiti, y un **socio real**
de un bufete de abogados externo de prestigio (Latham & Watkins) — dando
a la instrucción un peso legal añadido, como si la operación estuviera
supervisada por asesores externos.

## 2. La trampa — `original/fake_ceo_email.html`

El mensaje pedía al director financiero de la oficina de Hong Kong
autorizar transferencias internacionales urgentes, con la autoridad
combinada de "el jefe" y "los abogados de la empresa" respaldando la
petición.

## 3. Por qué 14 transferencias y no una sola

Repartir el fraude en **14 operaciones distintas**, en vez de una única
transferencia gigante, hace que cada movimiento individual parezca más
razonable y menos alarmante para cualquier control interno que revise
transacciones puntuales.

## 4. La fuga internacional — difícil de recuperar

El dinero se envió a cuentas repartidas entre **Rusia, Hong Kong, China,
Hungría y Polonia** — jurisdicciones distintas que complican
enormemente la cooperación legal necesaria para rastrear y congelar los
fondos a tiempo.

## 5. El desenlace

Un total de **46.703.232 dólares** transferidos. Ubiquiti solo consiguió
recuperar unos **8,1 millones** — dejando más de 38 millones de dólares
en pérdidas.

## 🛡️ Cómo se protege una empresa de esto

- **Verificación por canal independiente**, siempre, para cualquier
  cambio de cuenta bancaria o transferencia internacional — llamar a un
  número ya conocido, nunca al que aparece en el email.
- Ningún directivo, por "urgente" que suene el correo, debería poder
  saltarse el proceso normal de doble aprobación.
- Desconfía especialmente de instrucciones que combinan **autoridad +
  urgencia + confidencialidad** ("no lo comentes con nadie más") — es la
  combinación clásica del fraude BEC.
