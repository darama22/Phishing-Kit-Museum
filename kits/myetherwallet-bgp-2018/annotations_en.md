# MyEtherWallet — the BGP hijack — teardown

> 📚 Real case, documented by **BleepingComputer** and **Virus Bulletin**,
> with official communication from MyEtherWallet:
> [bleepingcomputer.com](https://www.bleepingcomputer.com/news/security/hacker-hijacks-dns-server-of-myetherwallet-to-steal-160-000/).
> Educational reconstruction of the wallet form — no real network
> manipulation involved.

## The room that breaks the museum's #1 piece of advice

In every earlier room we told you the same thing: *"check the URL,
letter by letter."* This room is the exception that proves **even that
advice has a limit** — because here, the URL in the address bar was
**exactly correct**.

## 1. There's no bait — that's the point

There was no email, no suspicious link, no malicious app. The victim
simply typed `myetherwallet.com`, like always. The problem wasn't the
victim or their behavior — it was **the internet's own infrastructure**.

## 2. BGP — the part of the internet almost nobody watches

**BGP (Border Gateway Protocol)** is the system that decides, globally,
which path traffic takes between different networks — it's the internet's
"road map." On April 24, 2018, someone sent fake BGP messages convincing
core routers that traffic destined for Amazon's DNS servers (the ones MEW
used) should actually go to a server under their control.

## 3. The trap — `original/index.html`

With internet routes hijacked, anyone trying to resolve
`myetherwallet.com` ended up on a **fake wallet**, hosted on a server in
Russia — indistinguishable at a glance from the real one.

## 4. The one crack — and why almost nobody noticed it

The only visible sign was a **TLS certificate warning**: the browser
flagged that the security certificate didn't match. Most users, without
fully understanding what that warning means, dismissed it and continued.

## 5. The outcome

About **$160,000** in Ethereum was stolen before the attack was detected
and neutralized. Security researchers dubbed this category of attack
**"MEWKit."**

## 🛡️ How to protect yourself from this (and why it's so hard)

- **Never dismiss a TLS certificate warning**, no matter how familiar the
  site seems — it's the only visible signal in this type of attack.
- This case shows why protocols like **DNSSEC** (to authenticate DNS
  responses) and **HSTS** (which directly prevents loading the site if
  the certificate isn't trusted) exist — their absence is exactly what
  made this attack possible.
- For critical infrastructure: there's very little an individual user can
  do against a BGP hijack — the responsibility falls on network providers
  and the services themselves adopting these protections.
