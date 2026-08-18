# Uber 2022 — MFA fatigue — teardown

> 📚 Real case, covered technically by **Dark Reading** and analyzed in
> depth by OnlineHashCrack:
> [darkreading.com](https://www.darkreading.com/cyberattacks-data-breaches/uber-breach-external-contractor-mfa-bombing-attack).
> Educational reconstruction — no real notification bombing.

## When the attack isn't "deceive" but "exhaust"

Every other room in the museum tricks the victim into believing
something false. This one is different: the attacker **didn't need to
lie particularly well** — they just needed to **outlast human
patience**.

## 1. The starting point — a password already stolen by someone else

The contractor's password wasn't stolen in this attack — it was
**bought** on a dark web marketplace. Someone, earlier, had already
captured it with an **infostealer** (exactly the kind of malware
cataloged in the sibling Malware Research Hub project). The vishing/MFA
fatigue was step two, not step one.

## 2. The bombardment — `original/index.html`

With the password in hand, the attacker logged in **over and over**, for
about an hour. Each attempt generated a **push notification** asking "is
this you trying to sign in?" on the victim's phone. A constant storm,
minute after minute.

## 3. The finishing touch — a human message when tech alone isn't enough

When the notifications alone didn't get an approval, the attacker went a
step further: they reached out **via WhatsApp** posing as Uber IT
support, saying something like *"sorry for the notification spam, just
approve one so we can fix it."* That final human nudge is what broke the
resistance.

## 4. Why it works — MFA's own design turns against you

MFA is designed to make approving fast and frictionless — a single tap.
That same design, meant for convenience, is what makes this attack
possible: **exhausting someone is easier than hacking a system.**

## 5. The outcome

Within minutes of the approval, the attacker had access to Uber's
internal **Slack** channels, **VPN**, and **source-code repositories**.
The company found out about the attack when the intruder themselves
posted a message on the company-wide Slack channel, visible to everyone.

## 🛡️ How to protect yourself from this

- Configure MFA that requires **a matching code or number** (number
  matching), not just an "Approve/Deny" button — this makes accidental
  approval from fatigue much harder.
- Set an **attempt limit** that locks the account after too many MFA
  requests in a short time, instead of allowing an indefinite
  bombardment.
- Any "IT support" contact asking you to approve something should be
  verified through an independent channel — never trust the channel that
  reaches out to you first.
