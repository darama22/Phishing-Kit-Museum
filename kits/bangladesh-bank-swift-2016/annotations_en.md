# Bangladesh Bank — the $81 million heist — teardown

> 📚 Real case, attributed by Western intelligence agencies and
> **SWIFT** to the North Korean **Lazarus** group, with analysis by CSO
> Online and ISACA Journal:
> [csoonline.com](https://www.csoonline.com/article/4131864/10-years-later-bangladesh-bank-cyberheist-still-offers-cyber-resiliency-lessons.html).
> This room reconstructs only the **bait email** — no real malware (see
> the notice at the end).

## The same group, three museum rooms

If you've already visited the **Sony Pictures** and **Ronin/Axie
Infinity** rooms, you'll recognize the signature: **Lazarus Group**, the
same type of North Korean state-sponsored actor, with a recurring
pattern — extreme patience, spear-phishing with malware, and surgically
precise targets. Here, the target was nothing less than a **central
bank**.

## 1. The bait — `original/index.html`

Like Target/Fazio and RSA SecurID, it all started with a targeted email
carrying a malware attachment — nothing especially sophisticated on the
surface, but extremely well aimed.

## 2. Weeks of "test runs" before acting

After the initial intrusion, attackers obtained a real **SWIFT** (the
international banking messaging system) operator's credentials via a
keystroke logger. Between January 24 and February 2, 2016, they ran
**several access test runs**, without launching any transfer yet — pure
reconnaissance before the strike.

## 3. The security failure that made it possible

The bank's four SWIFT-connected computers and servers had **no
firewall** and were connected directly to the open internet — no
additional layer of defense between the malware and the world's most
sensitive international transfer system.

## 4. The detail that prevented a bigger disaster

Of **35 attempted fraudulent transfers**, only **5 completed**. The rest
were blocked because the attackers themselves **misspelled** a
beneficiary's name — a transfer to the misspelled "Shalika Fandation"
triggered a compliance alert at an intermediary bank, stopping most of
the theft. A simple typo by the criminals themselves is estimated to have
saved hundreds of millions of dollars more.

## 5. The outcome

Even so, **$81 million** was stolen, transferred to accounts in the
Philippines and later laundered through **casinos in Macau**. The attack
is attributed to Lazarus Group, linked to North Korean intelligence.

## ⚠️ Important note about this room

Just like Target/Fazio, RSA SecurID, and Ronin/Axie, this room
reconstructs **only the bait email** — deliberately **without** real
malware. For that, the sibling project **Malware Research Hub** is the
right place.

## 🛡️ How an organization protects itself from this

- Any system connected to critical financial networks (like SWIFT) needs
  **dedicated firewalling, segmentation, and monitoring** — never a
  direct, unprotected connection to the open internet.
- Compliance controls (like reviewing beneficiary names) **work** — they
  are a real layer of defense, not just bureaucracy, as this case shows.
- No organization is "too big" or "too serious" to be a spear-phishing
  target — a central bank suffered this.
