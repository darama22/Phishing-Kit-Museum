# The 2020 Twitter hack — teardown

> 📚 Real case, documented in the official report by the **New York State
> Department of Financial Services**:
> [dfs.ny.gov/Twitter_Report](https://www.dfs.ny.gov/Twitter_Report).
> This room's files are an **educational reconstruction** of the
> mechanism — no real Twitter tools or credentials involved.

## Why this room breaks the pattern of all the others

No other room in the museum has a fake website, an email, or an invoice.
Here the "kit" is **a phone call.** And that was enough to hijack the
accounts of Barack Obama, Elon Musk, Bill Gates and Kim Kardashian in the
same afternoon.

## 1. The target — not the accounts, the employees

Attackers didn't try to guess celebrities' passwords. They went after the
link with the most power and the least oversight: **Twitter employees
with access to internal admin tools**, capable of managing any account on
the platform.

## 2. The bait — `original/vishing_script.txt`

*Vishing* = *voice phishing*, phishing by phone. Attackers called
employees posing as the **internal IT department**, with a believable
excuse (a corporate VPN issue, or similar) to get the employee to enter
their credentials on a page the attacker controlled, or hand them over
directly.

## 3. Why it's so hard to train people against this

Everyone learns to distrust "a weird link in an email." Few companies
train staff to distrust **a convincing voice call that sounds exactly
like real internal tech support**. It's the same social-engineering
principle as the other rooms, just attacking a different trust channel.

## 4. The admin tool — `original/fake_admin_panel.php`

With credentials from an employee with the right permissions, attackers
accessed a legitimate **internal Twitter admin panel** — they didn't have
to "hack" each account one by one: the company's own tool gave them
direct control over any account.

## 5. The outcome — 130 accounts, 45 used, a teenager

**130 high-profile accounts** were compromised; **45** were used to post
the same message: a fake Bitcoin promotion ("send money and we'll double
it back"). In a few hours, the scam netted over **$118,000**. Among those
arrested was a **17-year-old**.

## 🛡️ How an organization protects itself from this

- **Out-of-band verification**: any request for credentials "from IT"
  should be verified through a separate channel (call back a known
  internal number, never the one that called you).
- **Principle of least privilege**: no single employee should be able to
  access *any* high-profile account without additional controls
  (multi-person approval, automated alerts).
- Train against vishing with the same seriousness as email phishing — the
  channel changes, the psychological manipulation is the same.
