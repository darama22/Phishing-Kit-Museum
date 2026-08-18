# The email to the air-conditioning vendor — teardown

> 📚 Original investigation by **Brian Krebs (KrebsOnSecurity)**, the
> journalist who uncovered how it all started:
> [krebsonsecurity.com — Target Hackers Broke in Via HVAC Company](https://krebsonsecurity.com/2014/02/target-hackers-broke-in-via-hvac-company/) ·
> [Email Attack on Vendor Set Up Breach at Target](https://krebsonsecurity.com/2014/02/email-attack-on-vendor-set-up-breach-at-target/).
> This room reconstructs only the **bait email** that started the chain —
> it includes no real malware code (see the note at the end).

## The single most important lesson in the whole museum

No other room teaches this as clearly: **an attacker doesn't need to
break your security if they can break someone else's that you trust.**
Target had serious defenses. Fazio Mechanical, the company that serviced
its stores' air conditioning, didn't.

## 1. The real target wasn't the air conditioning

Fazio Mechanical had legitimate remote access to Target systems to manage
contracts, billing, and energy monitoring. That access, meant for boring
administrative tasks, turned out to be a door into the network of one of
the largest US retailers.

## 2. The bait — `original/fazio_phishing_email.html`

A Fazio employee received a targeted phishing email (*spear phishing*)
with a malicious attachment. Opening it installed **Citadel** — a banking
trojan derived from leaked Zeus source code.

## 3. Why this differs from a web credential-capture kit

Unlike the museum's other rooms, there's no fake site asking for a
password here. Citadel is **real malware** that, once inside the victim's
computer, directly steals credentials **already saved** on the system,
plus records the screen and keystrokes. The victim doesn't need to
actively "hand over" anything.

## 4. The full chain — from one PC to 40 million cards

1. Citadel captures legitimate credentials from Fazio.
2. Attackers use those credentials to get into Target systems connected
   to Fazio.
3. Once inside, they **move laterally** through the network for weeks.
4. They eventually reach the **point-of-sale terminals** at 1,797 stores
   and deploy malware to capture payment card data at the moment of each
   purchase.

## 5. The outcome

Payment card data from about **40 million customers** and personal data
from about **70 million** were compromised — one of the largest retail
breaches in history, with enormous legal and reputational costs for
Target.

## ⚠️ Important note about this room

This room reconstructs **only the bait email** that started the attack —
we deliberately **don't** include Citadel trojan code or any real malware:
that's outside the scope (and rules) of this museum, which covers
*phishing kits*, not executable malware. If you're interested in
researching real banking trojans like Citadel or the Zeus family, that's
the territory of the sibling project **Malware Research Hub**, where
samples are always kept encrypted and cataloged for that specific
purpose.

## 🛡️ How an organization protects itself from this

- Evaluate your **vendors'** security with the same rigor as your own —
  their access to your network is, in practice, an extension of your
  perimeter.
- **Segment your network**: an HVAC vendor's access should never be able
  to reach point-of-sale terminals.
- Free antivirus (like Fazio had) isn't enough against sophisticated,
  targeted malware.
