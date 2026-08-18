# The Excel that compromised SecurID — teardown

> 📚 Real case, documented by **Threatpost**, with technical coverage by
> Dark Reading and The Register:
> [threatpost.com](https://threatpost.com/rsa-securid-attack-was-phishing-excel-spreadsheet-040111/75099/).
> This room reconstructs only the **bait email** — no real exploit or code
> (see the note at the end).

## Why this case especially unnerves the industry

RSA wasn't just any company: **its SecurID product** was the two-factor
authentication system used by thousands of banks, governments, and
defense contractors worldwide. Compromising RSA wasn't stealing one
company's data — it was weakening the security of **its customers**, in
a cascade.

## 1. The bait — `original/index.html`

Two emails, sent on different days to two small groups of employees, with
the same subject: *"2011 Recruitment Plan."* Nothing alarming — quite the
opposite, it sounds like a boring internal HR document.

## 2. The detail that decided the attack

One of the emails landed in the **spam** folder. An employee, trusting
the subject line, **retrieved it from there and opened it anyway.** The
spam filter did its job — the human undid it.

## 3. The technical trap — `original/exploit_notice.txt`

The attachment, `2011 Recruitment plan.xls`, contained an embedded Flash
object exploiting a **zero-day** Adobe Flash vulnerability (no patch
available at the time). Opening the Excel file silently ran the exploit
and installed a backdoor with full remote access to the machine —
without the victim noticing anything odd beyond an Excel file that seemed
empty or corrupted.

## 4. Why this differs from stealing a password

Unlike almost every other room, there's no password to "type" into a fake
site here. The goal wasn't a credential — it was **full control of the
machine**, to move through the internal network from there and reach
sensitive SecurID system data.

## 5. The outcome — the domino effect

Months after the breach, information stolen from the SecurID system was
used in **intrusion attempts against defense contractors**, including
Lockheed Martin — showing that compromising a security company can have
a cascading effect on all its customers.

## ⚠️ Important note about this room

This room reconstructs **only the bait email**, deliberately **without**
real exploit or backdoor code — just like the Target/Fazio room, this is
outside the scope of a museum about *web phishing* kits. For real
malware/exploits, the sibling project **Malware Research Hub** is the
right place.

## 🛡️ How an organization protects itself from this

- Keep software (especially plugins like Flash, discontinued precisely
  because of its vulnerability history) always up to date.
- An email manually retrieved from spam deserves **more** scrutiny, not
  less — the filter already raised a flag.
- Sandbox attachments: open documents from questionable sources in an
  isolated environment before trusting them on your real machine.
