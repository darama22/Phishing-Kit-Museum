# W3LL / OV6 — disección

> 📚 Basado en la investigación pública de **Group-IB**, *"W3LL Done:
> Uncovering Phishing Ecosystem Behind BEC Attacks"*:
> [group-ib.com/resources/research-hub/w3ll-phishing](https://www.group-ib.com/resources/research-hub/w3ll-phishing/).
> Caso real de gran escala, con desmantelamiento posterior por el **FBI** y
> la policía de Indonesia. El código de este kit es una **reconstrucción
> educativa** del mecanismo documentado, no el kit original.

## Por qué esta sala es la más importante del museo

Todo lo anterior robaba **contraseñas**. Este kit demuestra por qué eso ya
no es suficiente para un atacante serio: **roba la sesión ya autenticada,
después de que hayas pasado el 2FA.** Es la técnica que de verdad preocupa
a cualquier equipo de seguridad hoy en día.

## 1. Qué es "Adversary-in-the-Middle" (AiTM)

En vez de mostrarte una web falsa aislada, el kit se coloca **como un
intermediario real** entre tú y Microsoft:

```
Tú  →  [servidor del atacante, actuando de proxy]  →  Microsoft (de verdad)
    ←                                              ←
```

Tú escribes tu usuario, tu contraseña, **y tu código de 2FA** — y todo eso
viaja de verdad hasta Microsoft, que te autentica con normalidad. La
diferencia es que el atacante, al estar en medio, **ve pasar la cookie de
sesión** que Microsoft te devuelve tras autenticarte con éxito.

## 2. La trampa — `original/proxy_relay.php`

El "kit" aquí no es solo HTML estático: es un **proxy activo** que:
1. Reenvía cada petición tuya al Microsoft real.
2. Reenvía cada respuesta de Microsoft de vuelta a ti (por eso todo
   *funciona* con normalidad — no hay nada "raro" que notar).
3. Cuando Microsoft emite la cookie de sesión final, el proxy hace una
   **copia** antes de devolvértela.

## 3. Por qué esto rompe el 2FA

Con esa cookie robada, el atacante puede entrar a tu cuenta **sin volver a
pedir contraseña ni segundo factor** — la sesión ya está autenticada. El
2FA protege el *momento del login*, pero no protege una sesión que ya
pasó ese momento y fue interceptada en el camino.

## 4. No era solo un kit — era una empresa criminal

Group-IB documentó que detrás de W3LL había un ecosistema completo con
**16 herramientas adicionales** vendidas junto al panel: envío masivo de
emails (SMTP senders), un escáner de vulnerabilidades para encontrar
objetivos, herramientas de redirección de enlaces, reconocimiento
automatizado de cuentas... Un kit de phishing convertido en suite completa
de ataque BEC (Business Email Compromise).

## 5. El desenlace

La investigación estimó **~56.000 cuentas de Microsoft 365 atacadas** y
**~8.000 comprometidas**, con fraude asociado por valor de **20 millones de
dólares**. Tras la publicación de la investigación, el **FBI** y la policía
de Indonesia llevaron a cabo un desmantelamiento de la infraestructura.

## 🛡️ Cómo protegerte de esto (importante: el 2FA normal NO basta aquí)

- Usa **llaves de seguridad físicas (FIDO2/passkeys)** cuando sea posible —
  a diferencia de un código, están ligadas al dominio real y un proxy AiTM
  no puede robarlas.
- Desconfía de logins que "tardan un poco más" o redirigen varias veces.
- Las organizaciones deben vigilar inicios de sesión desde ubicaciones o
  dispositivos inusuales **incluso con sesiones ya autenticadas**.
