# SecureBank Demo — teardown

> ⚠️ **Fictional, defanged kit**, written by the project as a format
> template. Invented brand, no real victims, no functional backend. Meant
> to teach how a real kit is read/annotated once you add one.

## 1. The mask — `original/index.html` + `style.css`

The HTML clones the look of a banking site (logo, colors, typography) so the
victim doesn't doubt for a second it's the real thing. Real kits usually
copy the original site's HTML/CSS verbatim with `curl`/`wget` and only touch
the login form.

**Key detail:** the browser URL is the one thing that gives the kit away —
that's why many use domains that closely resemble the real one
(`secure-bank-login.com` instead of `securebank.com`) or subdomains on free
hosting services.

## 2. The trap — `original/capture.js`

This is where the theft happens. The script:
1. Intercepts the form `submit` **before** it goes anywhere real.
2. Reads username and password from the fields.
3. **(In a real kit)** sends them to an attacker's server via `fetch()`/
   `POST` — in this demo that line is **commented out and replaced with a
   `console.log`**, so it's clear where the theft would happen without the
   file doing anything.
4. Redirects the victim to the REAL banking site, so they think the login
   simply failed once and don't get suspicious.

## 3. The leak — where the data goes (in a real kit)

Real kits rarely use a "serious" server of their own: they usually send
captured data to:
- A **Telegram bot** (instant, hard to trace).
- An **email** to a disposable account.
- A `log.txt` file on the compromised hosting itself (the clumsiest option,
  and the one **NEVER** uploaded to this museum — see RULES.md).

## 4. Evasion — how they hide

- They check the **User-Agent**: if they detect a security bot (Google Safe
  Browsing, automated scanners), they show a blank page or a 404 instead of
  the phishing page — so the scanner never flags it as malicious.
- Some check the **IP** and only show the kit to addresses from the region
  where the target victims live.
- They obfuscate form field names (`fldA`, `fldB` instead of `username`,
  `password`) to make automated analysis harder.

## 🛡️ How to protect yourself

- Never type your password after arriving via an email/SMS link — always
  type the URL yourself or use your official app.
- Check the exact URL, letter by letter.
- Turn on two-factor authentication — even if they steal your password,
  they can't get in without the second factor.
