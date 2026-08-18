# Cómo ejecutar un kit de verdad, en local y sin riesgo

Cada sala del museo (la que tiene PHP) es **código real que funciona** —
puedes clonar el flujo completo en tu máquina y ver exactamente qué hace
cada paso. La diferencia con un kit real es una sola: **el "robo" siempre
se queda en un archivo de texto en tu propio disco** (`__DEMO_LOG__.txt`,
ignorado por git), nunca sale a ningún servidor externo.

## Requisitos

Solo PHP (viene con la mayoría de sistemas, o `sudo apt install php-cli`).

## Cómo arrancar una sala

```bash
cd "kits/<nombre-del-kit>/original"
php -S localhost:8010
```

Abre `http://localhost:8010/` en el navegador y rellena el formulario con
**datos inventados** (nunca tus credenciales reales, aunque sea inofensivo
— es buena práctica). Verás:

- El flujo completo funcionando como en un kit real (redirecciones,
  mensajes, comprobaciones anti-bot...).
- Un archivo `__DEMO_LOG__.txt` que aparece en la misma carpeta, con lo
  que un atacante real habría capturado — para que veas el dato "robado"
  con tus propios ojos, sin que haya salido de tu ordenador.

Cuando termines, `Ctrl+C` para parar el servidor y borra el
`__DEMO_LOG__.txt` si quieres (está en `.gitignore`, así que nunca se
subirá aunque lo dejes).

## Por qué esto es seguro

- `php -S localhost:8010` solo escucha en tu propia máquina — nadie en
  internet puede acceder a él.
- Ningún archivo hace peticiones de red reales a servidores externos (ni
  `mail()`, ni `curl` a terceros, ni bots de Telegram) — se comprueba
  explícitamente en cada `annotations.md`.
- El único "objetivo" eres tú mismo, probando con datos inventados.

**No despliegues esto en un hosting público ni lo expongas a internet.**
Está pensado para correr en tu `localhost` y nada más.

## Caso especial: la sala W3LL / AiTM (dos servidores)

Esta sala demuestra un **proxy real**, así que necesita dos servidores
locales hablando entre sí — uno hace de "kit de phishing" y el otro de
"Microsoft" de mentira (100% inventado, sin ninguna conexión real a
Microsoft). Se usan dos puertos porque el servidor integrado de PHP es de
un solo hilo y no puede llamarse a sí mismo.

```bash
# Terminal 1 — el "Microsoft" de mentira
cd "kits/w3ll-aitm-pattern/original"
php -S 127.0.0.1:8099

# Terminal 2 — el kit de phishing (el proxy)
cd "kits/w3ll-aitm-pattern/original"
php -S localhost:8013
```

Abre `http://localhost:8013/`, rellena el formulario de prueba y verás
cómo la petición viaja por el proxy hasta el "Microsoft" de mentira (en el
otro puerto) y vuelve — con la sesión capturada en `__DEMO_LOG__.txt`.
