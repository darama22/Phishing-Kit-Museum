# LogoKit — disección

> 📚 Basado en la investigación pública de **RiskIQ / Microsoft (2021)**,
> recogida por Threatpost y SecurityAffairs, con una actualización posterior
> documentada por **Resecurity**:
> [threatpost.com — LogoKit Simplifies Office 365/SharePoint Login Phishing](https://threatpost.com/logokit-simplifies-office-365-sharepoint-login-phishing-pages/163430/).
> El código de este kit es una **reconstrucción educativa** del mecanismo
> documentado, no el kit original.

## La idea que lo hace especial

Todos los kits anteriores necesitaban **clonar cada marca a mano**: una
carpeta de HTML/CSS por cada banco, cada tienda, cada servicio suplantado.
LogoKit resuelve eso con una idea muy simple e inteligente: **¿por qué
clonar el logo si puedo pedirlo prestado en tiempo real?**

## 1. Una URL, una víctima, una marca — `original/index.html`

El enlace que recibe la víctima por email no es solo un enlace: lleva **su
email incrustado como parámetro**, por ejemplo:

```
https://kit-desplegado.example/login?e=victima@empresa.com
```

La misma página HTML sirve para atacar a cualquiera — lo que cambia es lo
que hace el JavaScript **después** de cargar.

## 2. El truco del logo — `original/dynamic.js`

Al cargar, el script:
1. Lee el dominio de la empresa a partir del email de la víctima
   (`empresa.com` en el ejemplo de arriba).
2. Pide el logo de esa empresa a un **servicio público y legítimo** —
   Clearbit Logo API o el buscador de favicons de Google — servicios
   pensados para que developers muestren el logo de cualquier empresa
   fácilmente, no para hacer phishing.
3. Inserta ese logo real en la página al vuelo.
4. **Autocompleta el campo de email** con el de la víctima, leído de la URL.

El resultado: la víctima ve *su propia empresa*, *su propio email ya
escrito*, con el logo correcto — sin que el atacante haya tenido que
preparar nada específico para esa víctima en concreto.

## 3. Por qué es tan difícil de detectar

Como el logo se pide a un servicio **legítimo** (Clearbit, Google) y no se
aloja en el propio kit, los filtros que buscan "imágenes conocidas de
phishing" no encuentran nada sospechoso — la imagen es 100% real, solo que
usada con mala intención.

## 4. La evolución — capturas de pantalla reales de fondo

Investigaciones posteriores (Resecurity) documentaron variantes que van un
paso más allá: usan un servicio externo (**Thum.io**) para generar una
**captura de pantalla real** de la web de la empresa objetivo y ponerla de
fondo, haciendo el engaño visualmente casi indistinguible del sitio real.

## 5. La fuga — `original/dynamic.js` (continuación)

En cuanto la víctima envía la contraseña, el script hace una petición
**AJAX en segundo plano** (sin recargar la página) al servidor del
atacante, y después redirige a la web corporativa real — el mismo patrón
de "que no sospeches" que ya viste en las otras salas, pero aquí ejecutado
en el cliente en vez de en el servidor.

## 🛡️ Por qué este caso importa especialmente

Enseña que **"la imagen es del logo real" no significa "la web es real"**.
El indicador fiable sigue siendo uno solo: **la URL exacta del dominio**,
nunca el aspecto visual de la página — por muy perfecto, oficial y
personalizado que parezca.
