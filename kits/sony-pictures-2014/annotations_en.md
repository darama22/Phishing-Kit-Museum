# The fake Apple ID that leaked Sony Pictures — teardown

> 📚 Real case, presented at RSA Conference and covered by Computerworld,
> eWeek, and SiliconANGLE:
> [computerworld.com](https://www.computerworld.com/article/2913805/).
> The FBI attributed the attack to North Korea, with DOJ charges against
> an identified operative. This room reconstructs only the capture
> mechanism — no real Apple branding or employee data.

## Why this room teaches the museum's most elegant trick

There's no banking site or invoice here — there's something much
subtler: **a form that pretends to fail while it has actually already
stolen your password.** And behind this mechanism is one of the most
destructive corporate hacks in history.

## 1. The bait — not corporate first, personal first

Attackers didn't hit Sony's accounts first. They sent system
administrators and executives a **fake Apple ID verification** email —
targeting something personal, far less monitored by the company's
security team than corporate accounts.

## 2. The trap — `original/index.html` + `capture.php`

The victim enters their Apple ID and password. The page **genuinely
captures the data** and, at the same instant, shows an error message:
*"password not accepted, try again."* The victim, thinking they simply
mistyped, **tries again** — convinced the mistake was theirs, not the
page's.

## 3. The pivot — from one personal account to an entire company

With the stolen Apple ID and password, attackers used those same
employees' **public LinkedIn profiles** to infer their corporate username
format (something like `first.last@sonypictures.com`). Then they tested
whether that person had **reused the same password** on their work
account.

This is the step that turns a "personal" phish into a massive corporate
breach: people reuse passwords, and attackers know it.

## 4. The outcome

Once inside Sony Pictures' network, attackers deployed **"wiper"**
malware that erased entire systems, and leaked unreleased films, scripts,
contracts, and thousands of internal emails — amid the controversy over
the release of *The Interview*. The FBI attributed the attack to North
Korea, and the US Department of Justice charged an identified North
Korean operative.

## 🛡️ How to protect yourself from this

- **Never reuse passwords** between personal and work accounts — that's
  exactly the link this attack exploited.
- If a login "fails" right after clicking an email link, **stop and check
  the URL** before retrying — an immediate failure like that is a classic
  red flag.
- Review what public information (LinkedIn, social media) could be used
  to infer your corporate username or password patterns.
