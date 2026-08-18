# The Google Docs worm — teardown

> 📚 Real case, technically documented by **Netskope** ("CloudPhishing
> worm") and covered by BankInfoSecurity and SANS ISC:
> [bankinfosecurity.com](https://www.bankinfosecurity.com/attackers-unleash-oauth-worm-via-google-docs-app-a-9888) ·
> [netskope.com](https://www.netskope.com/blog/google-doc-cloudphishing-worm-attack-technical-analysis).
> This room reconstructs the OAuth consent screen — not a real app and
> never connects to any Google account.

## The room that breaks every rule in the museum

Every room so far had one thing in common: **a fake site asking for a
password.** This one doesn't. Here the victim **never types anything**
into any fake site — they go to Google's *real* page, log in for real,
and the theft happens anyway. That's why this case scared the industry so
much.

## 1. The bait — a 100% legitimate link

The victim got an email that looked like a normal Google Docs
invitation: *"so-and-so shared a document with you."* Clicking it truly
led to `accounts.google.com` — Google's real domain, no spoofing at all.

## 2. The trap — `original/oauth_consent.html`

There, on the authentic page, Google asked whether you wanted to grant an
app called **"Google Docs"** access to your account. The flaw: Google
**didn't verify** that the name "Google Docs" actually belonged to
Google — anyone could register a third-party app with that same name and
the real logo, and the consent screen looked indistinguishable from a
legitimate request.

## 3. Why this is more dangerous than stealing a password

By clicking "Allow," the victim **didn't hand over their password** —
they gave the malicious app an **OAuth token** with permission to read,
send, delete, and manage their email, no password needed at all. Changing
your password afterward **wouldn't have revoked that access.**

## 4. The worm — why it spread so fast

The moment the victim granted permission, the app itself **read their
contact list** and automatically forwarded itself to all of them — with
no need for the attacker to send a single more email by hand. Every new
victim unknowingly became the next spreading point.

## 5. The outcome — the museum's fastest response

The first malicious email went out at 2:27pm EST. Within **just over an
hour**, Google had detected the pattern, revoked the malicious app's
token platform-wide, and stopped the spread. Even so, up to an estimated
**1 million accounts** authorized the app within that window.

## 🛡️ How to protect yourself from this

- Periodically review which **third-party apps** have access granted to
  your Google/Microsoft account (in your account's security settings) and
  revoke any you don't recognize.
- Before clicking "Allow" on a consent screen, look closely at **what
  permissions it's requesting** — read/send/delete email is
  disproportionate for "viewing a document."
- A 100% legitimate domain in the address bar **doesn't guarantee** that
  whatever it asks you next is safe.
