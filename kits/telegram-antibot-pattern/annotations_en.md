# Antibot + Telegram pattern — teardown

> 📚 Based on public research by **SiteLock**, *"The Anatomy Of A Phishing
> Kit,"* which analyzed a real kit targeting a US credit union:
> [sitelock.com/blog/anatomy-of-a-phishing-kit](https://www.sitelock.com/blog/anatomy-of-a-phishing-kit/).
> This kit's code is an **educational reconstruction** of the documented
> pattern, not a copy of a stolen kit — with all outbound communication
> commented out and disabled.

This case is a step up from the "Phish in a Barrel" room: no longer a
single loose PHP script, it's a **professionalized kit** with modules.

## 1. The mask — `original/index.html`

Same idea as the classic pattern: a cloned login form. The difference is
what happens **before** the victim even gets to see it.

## 2. The gatekeeper — `original/Antibot.php`

Before showing anything, the real kit checks:
- **User-Agent**: if it detects a known security bot (scanners, Google Safe
  Browsing), it serves a 404 or a blank page.
- **Hostname/IP**: blocks IP ranges from known cybersecurity companies (so
  analysts don't see the phishing page when investigating from their
  office).

Only if you pass that filter does the kit show you the fake page for real.
That's why a phishing link sometimes "doesn't work" when an analyst opens
it, yet still infects regular users.

## 3. The brain — `original/zsec_config.php`

A separate config file holding **API keys** and the **remote host** the
kit reports to — meaning the kit doesn't act alone, it talks to a
command-and-control (C&C) infrastructure run by the kit's operator, who can
manage several different phishing campaigns from a single central panel.

## 4. The double leak — `original/mainnet.php`

This is where stolen data goes, through **two channels at once**:
1. A **local** log file, on the compromised server itself.
2. A message to a **Telegram bot**, in real time — the attacker gets the
   stolen credential on their phone seconds after the victim types it.

**Why Telegram instead of email:** it's instant, hard to trace back to a
real identity, and doesn't depend on the compromised server having
`mail()` properly configured.

## 🛡️ How to protect yourself

- These kits are harder for automated tools to detect (thanks to the
  anti-bot filter) — real protection relies more on the user: be wary of
  links via SMS/email even if they "seem" to pass filters.
- 2FA is still the most effective defense: they steal the password
  instantly, but without the second factor they can't get into the
  account.
