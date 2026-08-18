# Anthem 2015 — the largest healthcare breach — teardown

> 📚 Real case, with formal charges filed by the **US Department of
> Justice** against an identified member of a China-linked hacking group:
> [justice.gov](https://www.justice.gov/archives/opa/pr/member-sophisticated-china-based-hacking-group-indicted-series-computer-intrusions-including).
> This room reconstructs only the **bait email** — no real malware (see
> the notice at the end).

## The number that closes out the museum

**78.8 million people.** It's no exaggeration to call this the largest
healthcare data breach in history — and, as in so many other rooms in
this museum, it all started with a single click on a link.

## 1. The bait — `original/index.html`

A targeted email, disguised as legitimate internal communication, with a
malicious link. Clicking it silently installed a backdoor on the
employee's machine.

## 2. Patience — months of quiet reconnaissance

Unlike an attack looking to steal and run quickly, here attackers took
**months** to explore Anthem's network undetected, until they located and
understood the single most valuable system: the **enterprise data
warehouse**, where information on tens of millions of people was
concentrated.

## 3. Exfiltration — encrypted to fly under the radar

Before pulling data out of the network, the attackers themselves
**compressed and encrypted it** — so any data-loss-prevention tool
inspecting outbound traffic couldn't identify what kind of information
was being stolen.

## 4. Covering their tracks

After completing exfiltration, they deleted the encrypted files from
Anthem's system — reducing the evidence available for a later forensic
investigation.

## 5. The outcome

Data on **~78.8 million people** compromised: names, health ID numbers,
dates of birth, Social Security numbers, addresses, phone numbers,
emails, and employment and income data. The US Department of Justice
charged an identified member of a China-linked hacking group.

## ⚠️ Important note about this room

Just like the Target/Fazio, RSA SecurID, and Ronin/Axie rooms, this room
reconstructs **only the bait email** — deliberately **without** any
backdoor code or real malware. For that, the sibling project **Malware
Research Hub** is the right place.

## 🛡️ How an organization protects itself from this

- The most sensitive data (like an enterprise data warehouse) needs
  **additional layers** of authentication and monitoring, not just the
  same perimeter protecting the rest of the network.
- Watch for **encrypted, compressed** outbound traffic heading to unusual
  destinations — that's precisely the technique used to evade detection
  here.
- Months of "silence" after an intrusion doesn't mean nothing happened —
  it means the attacker is being careful.
