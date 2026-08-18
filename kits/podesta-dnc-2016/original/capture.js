/*
 * capture.js — DESACTIVADO A PROPÓSITO. Ver annotations.md, sección 5.
 * Reconstrucción educativa del mecanismo de captura tras el clic en la
 * falsa alerta de seguridad. Nunca se ejecuta dentro del museo.
 */

document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("fld-email").value;
  const pass = document.getElementById("fld-pass").value;

  // EN UN ATAQUE REAL: la contraseña capturada aquí le da al atacante
  // acceso directo a la cuenta de correo de la víctima — sin necesidad de
  // ningún otro paso, porque en 2016 el objetivo no tenía 2FA activado.
  console.log("[DEMO] Aquí un ataque real capturaría:", { email, pass: "••••••" });

  const box = document.createElement("div");
  box.style.cssText = "margin-top:16px;padding:10px 12px;background:#fef3c7;border:1px solid #f59e0b;border-radius:6px;font-size:11px;color:#92400e;text-align:left;";
  box.textContent = `[DEMO] Capturado (solo en esta página, nunca enviado): email="${email}", contraseña="${"•".repeat(pass.length)}". En el caso real de 2016, esta misma captura dio acceso a miles de correos internos de una campaña presidencial.`;
  document.querySelector(".login-box").appendChild(box);
});
