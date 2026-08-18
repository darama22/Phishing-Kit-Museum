# El Excel que comprometió SecurID — disección

> 📚 Caso real, documentado por **Threatpost**, con cobertura técnica de
> Dark Reading y The Register:
> [threatpost.com](https://threatpost.com/rsa-securid-attack-was-phishing-excel-spreadsheet-040111/75099/).
> Esta sala reconstruye únicamente el **email/cebo** — sin ningún exploit
> ni código real (ver aviso al final).

## Por qué este caso asusta especialmente al sector

RSA no era una empresa cualquiera: **su producto SecurID** es el sistema
de autenticación de doble factor que usaban miles de bancos, gobiernos y
contratistas de defensa en todo el mundo. Comprometer a RSA no fue robar
los datos de una empresa — fue debilitar la seguridad de **sus clientes**,
en cascada.

## 1. El cebo — `original/index.html`

Dos emails, enviados en días distintos a dos grupos pequeños de
empleados, con el mismo asunto: *"2011 Recruitment Plan"*. Nada alarmante
— justo lo contrario, suena a un documento interno aburrido de RRHH.

## 2. El detalle que decide el ataque

Uno de los correos cayó en la carpeta de **spam**. Un empleado, confiando
en el asunto, **lo recuperó de ahí y lo abrió de todos modos**. El
filtro de spam hizo su trabajo — el ser humano lo deshizo.

## 3. La trampa técnica — `original/exploit_notice.txt`

El archivo adjunto, `2011 Recruitment plan.xls`, contenía un objeto Flash
embebido que explotaba una vulnerabilidad de **día cero** de Adobe Flash
(sin parche disponible en ese momento). Al abrir el Excel, el exploit se
ejecutaba silenciosamente e instalaba una puerta trasera con acceso
remoto completo al equipo — sin que la víctima notara nada raro más allá
de un Excel que parecía vacío o corrupto.

## 4. Por qué esto es distinto a robar una contraseña

A diferencia de casi todas las demás salas, aquí no hay ninguna
contraseña que "escribir" en una web falsa. El objetivo no era una
credencial — era **control total del equipo**, para desde ahí moverse por
la red interna y llegar a los datos sensibles del sistema SecurID.

## 5. El desenlace — el efecto dominó

Meses después de la brecha, la información robada del sistema SecurID se
usó en **intentos de intrusión contra contratistas de defensa**, incluido
Lockheed Martin — demostrando que comprometer una empresa de seguridad
puede tener un efecto en cascada sobre todos sus clientes.

## ⚠️ Nota importante sobre esta sala

Esta sala reconstruye **solo el email/cebo**, deliberadamente **sin**
código real del exploit ni de ninguna puerta trasera — igual que la sala
de Target/Fazio, esto queda fuera del alcance de un museo sobre kits de
*phishing web*. Para malware/exploits reales, el proyecto hermano
**Malware Research Hub** es el sitio adecuado.

## 🛡️ Cómo se protege una organización de esto

- Mantén el software (especialmente plugins como Flash, ya descontinuado
  precisamente por su historial de vulnerabilidades) siempre actualizado.
- Un correo recuperado manualmente del spam merece **más** escrutinio, no
  menos — el filtro ya dio una señal de alarma.
- Sandboxing de adjuntos: abre documentos de origen dudoso en un entorno
  aislado antes de confiar en ellos con tu equipo real.
