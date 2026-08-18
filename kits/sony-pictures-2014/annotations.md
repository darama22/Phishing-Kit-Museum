# El falso Apple ID que filtró Sony Pictures — disección

> 📚 Caso real, presentado en RSA Conference y recogido por Computerworld,
> eWeek y SiliconANGLE:
> [computerworld.com](https://www.computerworld.com/article/2913805/).
> El FBI atribuyó el ataque a Corea del Norte, con cargos del DOJ contra
> un operativo identificado. Esta sala reconstruye únicamente el
> mecanismo de captura — sin la marca real de Apple ni datos de empleados
> reales. Ver annotations.md.

## Por qué esta sala enseña el truco más elegante del museo

Aquí no hay una web de banca ni una factura — hay algo mucho más sutil:
**un formulario que finge fallar mientras en realidad ya ha robado tu
contraseña.** Y detrás de este mecanismo hay uno de los hackeos
corporativos más destructivos de la historia.

## 1. El cebo — no van a por lo corporativo, van a por lo personal

Los atacantes no atacaron primero las cuentas de Sony. Enviaron a
administradores de sistemas y ejecutivos un email de **verificación de
Apple ID falsa** — apuntando a algo personal, mucho menos vigilado por el
departamento de seguridad de la empresa que las cuentas corporativas.

## 2. La trampa — `original/index.html` + `capture.php`

La víctima introduce su Apple ID y contraseña. La página **captura el
dato de verdad** y, en el mismo instante, muestra un mensaje de error:
*"la contraseña no es correcta, inténtalo de nuevo".* La víctima, pensando
que simplemente se equivocó al escribir, **vuelve a intentarlo** —
convencida de que el fallo fue suyo, no de la página.

## 3. El pivote — de una cuenta personal a toda una empresa

Con el Apple ID y contraseña robados, los atacantes usaron los
**perfiles públicos de LinkedIn** de esos mismos empleados para deducir
el formato de su usuario corporativo (algo como
`nombre.apellido@sonypictures.com`). Después, probaron si esa persona
había **reutilizado la misma contraseña** en su cuenta de trabajo.

Este es el paso que convierte un phishing "personal" en una brecha
corporativa masiva: la gente reutiliza contraseñas, y los atacantes lo
saben.

## 4. El desenlace

Una vez dentro de la red de Sony Pictures, los atacantes desplegaron un
malware **"wiper"** que borró sistemas enteros, y filtraron películas
inéditas, guiones, contratos y miles de correos internos — en pleno
contexto de la polémica por el estreno de *The Interview*. El FBI
atribuyó el ataque a Corea del Norte, y el Departamento de Justicia de
EE.UU. presentó cargos contra un operativo norcoreano identificado.

## 🛡️ Cómo protegerte de esto

- **Nunca reutilices contraseñas** entre cuentas personales y de trabajo
  — es exactamente el eslabón que este ataque explotó.
- Si un login "falla" justo después de hacer clic en un enlace de email,
  **para y verifica la URL** antes de reintentarlo — un fallo así de
  inmediato es una señal de alarma clásica.
- Revisa qué información pública (LinkedIn, redes sociales) podría usarse
  para deducir tu usuario corporativo o tus patrones de contraseña.
