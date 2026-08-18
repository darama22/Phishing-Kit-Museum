# Phish in a Barrel — teardown

> 📚 Based on real research by **Jordan Wright (Duo Security, 2014)**, who
> analyzed **thousands of phishing kits** found on compromised servers:
> [jordan-wright.com/blog/2014/07/30/how-to-hunt-down-phishing-kits](https://jordan-wright.com/blog/2014/07/30/how-to-hunt-down-phishing-kits/).
> This kit's code is an **educational reconstruction** of the documented
> pattern, not a copy of a stolen kit — with the exfiltration line always
> disabled.

## 1. How it gets deployed

The attacker compromises a server (vulnerable WordPress, stolen FTP
credentials...) and uploads the kit there: a `.zip` with the cloned HTML +
a PHP script. When the victim clicks the phishing email's link, they land
on this fake page hosted on a **legitimate but hacked** server — which also
helps dodge domain-reputation filters.

## 2. The mask — `original/index.html`

A clone of a generic banking site. The real research found dozens of
different banks impersonated with the exact same kit template, just
swapping the logo and colors.

## 3. The trap — `original/harvest.php`

The server-side PHP:
1. Receives username/password via `$_POST` when the victim submits the
   form.
2. If fields are missing, **redirects** to another page in the kit (so it
   looks like a simple login error, not an attacker's failure).
3. Captures the victim's **IP** and resolves their **country** (so the
   attacker knows where each credential came from without checking each
   one by hand).
4. Builds a message and sends it with PHP's `mail()` function —
   **that line is commented out in this kit**, replaced with a harmless
   `error_log()` that only writes to a local test log.

## 4. The leak — why email, not something "more pro"

Wright's research found that most send data by **email to a free
account** (Gmail, etc.), with a subject like
`"[attacker's nickname] - [victim's country]"` — so the attacker can
quickly filter their inbox by whichever country's credentials they're
interested in selling or using.

## 5. The most surprising detail — they give themselves away

Wright found these kits precisely because attackers are **careless**: they
leave the original kit `.zip` **on the very server** where they deployed
it, often with **open directory listing**
(`Index of /uploads/`). Anyone who finds that folder can download the
entire kit and see exactly how it works — that's how this is legitimately
researched.

Alongside the phishing kit there were often **other tools** from the same
attacker reusing the compromised server: a WordPress brute-forcing script
and a *webshell* (backup remote access) — meaning the hacked server gets
exploited for several things at once, not just phishing.

## 🛡️ How to protect yourself

- If a bank/service "fails" your login right after you type your password
  once, be suspicious — that's exactly this kit's pattern.
- Check that the URL is the real domain, not some random server.
- Turn on 2FA: even if your password gets emailed elsewhere, they can't get
  in without the second factor.
