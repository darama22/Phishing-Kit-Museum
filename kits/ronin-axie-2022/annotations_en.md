# The biggest crypto theft in history — teardown

> 📚 Official attribution by the **FBI and the US Treasury Department**
> to the North Korean Lazarus group, with technical analysis by
> Chainalysis and Halborn:
> [chainalysis.com](https://www.chainalysis.com/blog/axie-infinity-ronin-bridge-dprk-hack-seizure/) ·
> [halborn.com](https://www.halborn.com/blog/post/explained-the-ronin-hack-march-2022).
> Educational reconstruction — no real malware (see the notice at the
> end).

## The number that opens this room

**$625 million.** Not an exaggerated headline figure — that's what
Lazarus Group stole from a single blockchain network, and it all started
with a LinkedIn message offering a job.

## 1. The bait — not an email, an entire hiring process

Attackers didn't send a malicious file outright. They reached senior
engineers at Sky Mavis (the company behind Axie Infinity) via
**LinkedIn**, with job offers that looked professional and tailored to
each target's profile.

## 2. Patience as a weapon — `original/fake_job_offer.html`

Here's what makes this case different from a quick phish: there were
**several rounds of fake interviews**, with all the normalcy of a real
hiring process. Only at the end, as part of a supposed "contract offer,"
did the malicious file arrive — at the moment the victim was most relaxed
and least alert, after weeks of process.

## 3. The document — `original/fake_offer_letter.txt`

The file was presented as the employment contract document. Opening it
installed malware that gave attackers a foothold inside Sky Mavis's
infrastructure.

## 4. The technical target — why that engineer, not just anyone

This wasn't a random attack: they specifically sought someone with access
to the Ronin network's **validator nodes**. That network needed 5 of 9
validator signatures to approve a withdrawal — attackers compromised 4
nodes directly from the infected machine, and got the fifth signature by
exploiting a **misconfigured RPC node** Sky Mavis used to save fees for
its players.

## 5. The outcome

**173,600 ETH and 25.5 million USDC** — about $625 million at the time of
the theft — withdrawn in two transactions. The FBI and US Treasury
attributed the attack to **Lazarus Group**, the same type of North
Korean state actor also linked to the Sony Pictures hack (see that room
in the museum).

## ⚠️ Important note about this room

Just like the Target/Fazio and RSA SecurID rooms, this room reconstructs
**only the recruitment message and the bait document** — deliberately
**without** any real malware. For real malware/exploits, the sibling
project **Malware Research Hub** is the right place.

## 🛡️ How to protect yourself from this

- A hiring process **should never require** opening an executable or
  macro to "complete a technical test" — use isolated environments if you
  genuinely need to run something from a stranger.
- Be especially suspicious at the **end** of a long, convincing process —
  that's exactly when your guard drops.
- In critical infrastructure (blockchain, financial), **segment**
  access: no single engineer should be able to compromise multiple
  validation signatures alone.
