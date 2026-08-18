# Phish in a Barrel — disección

> 📚 Basado en la investigación real de **Jordan Wright (Duo Security, 2014)**,
> que analizó **miles de kits de phishing** encontrados en servidores
> comprometidos: [jordan-wright.com/blog/2014/07/30/how-to-hunt-down-phishing-kits](https://jordan-wright.com/blog/2014/07/30/how-to-hunt-down-phishing-kits/).
> El código de este kit es una **reconstrucción educativa** del patrón que
> documenta, no una copia de un kit robado — con la línea de exfiltración
> siempre desactivada.

## 1. Cómo se despliega

El atacante compromete un servidor (WordPress vulnerable, credenciales FTP
robadas...) y sube ahí el kit: un `.zip` con el HTML clonado + un script PHP.
Cuando la víctima hace clic en el enlace del email de phishing, llega a esa
web falsa alojada en un servidor **legítimo pero hackeado** — lo que además
ayuda a esquivar los filtros de reputación de dominio.

## 2. La máscara — `original/index.html`

Clon de una web de banca genérica. La investigación real encontró decenas de
bancos distintos suplantados con la misma plantilla de kit, solo cambiando
logo y colores.

## 3. La trampa — `original/harvest.php`

El PHP del lado del servidor:
1. Recibe usuario/contraseña por `$_POST` cuando la víctima envía el formulario.
2. Si faltan campos, **redirige** a otra página del kit (para que parezca un
   simple error de login, no un fallo del atacante).
3. Captura la **IP** y resuelve el **país** de la víctima (para que el
   atacante sepa de dónde vienen las credenciales sin tener que mirar cada
   una a mano).
4. Compone un mensaje y lo envía con la función `mail()` de PHP —
   **en este kit esa línea está comentada**, sustituida por un
   `error_log()` inofensivo que solo escribe en un log local de prueba.

## 4. La fuga — por qué email y no algo "más pro"

La investigación de Wright encontró que la mayoría manda los datos por
**email a una cuenta gratuita** (Gmail, etc.), con un asunto tipo
`"[Apodo del atacante] - [País de la víctima]"` — así el atacante filtra
rápido por bandeja de entrada según qué país le interesa vender/usar.

## 5. El detalle que más sorprende — se delatan solos

Wright encontró estos kits precisamente porque los atacantes son
**descuidados**: dejan el `.zip` original del kit **en el mismo servidor**
donde lo desplegaron, y muchas veces con **listado de directorio abierto**
(`Index of /uploads/`). Cualquiera que encuentre esa carpeta puede descargar
el kit entero y ver exactamente cómo funciona — así es como se investiga esto
de forma legítima.

Además, junto al kit de phishing solía haber **otras herramientas** del mismo
atacante reutilizando el servidor comprometido: un script de fuerza bruta
contra WordPress y una *webshell* (acceso remoto de respaldo) — es decir, el
servidor hackeado se explota para varias cosas a la vez, no solo el phishing.

## 🛡️ Cómo protegerte

- Si un banco/servicio te "falla el login" tras meter la contraseña una vez,
  sospecha — es exactamente el patrón de este tipo de kit.
- Comprueba que la URL sea el dominio real, no un servidor cualquiera.
- Activa 2FA: aunque envíen tu contraseña por email a otro sitio, sin el
  segundo factor no pueden entrar.
