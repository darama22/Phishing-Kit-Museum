# The tech support scam — teardown

> 📚 Real pattern, documented by the **FBI (IC3)** and the **FTC**:
> [fbi.gov](https://www.fbi.gov/how-we-can-help-you/scams-and-safety/common-frauds-and-scams/tech-support-scams) ·
> [consumer.ftc.gov](https://consumer.ftc.gov/articles/how-spot-avoid-and-report-tech-support-scams).
> Educational reconstruction of the lock screen — no real remote-access
> software installed.

## The room that reverses the museum's whole direction

In every earlier room, the attacker contacts the victim: an email, a
call, a text. Here it's the opposite: the victim themselves, gripped by
panic, **calls the attacker**. That reversal is what makes this scam so
effective.

## 1. The bait — `original/index.html`

While browsing normally, a full-screen pop-up appears: *"SECURITY ALERT —
your computer is infected,"* with a Windows logo, alarm sounds, and a
"tech support" phone number front and center. The window is designed to
be **hard to close** — the more failed attempts to close it, the higher
the panic climbs.

## 2. The first red flag almost nobody knows

**Neither Microsoft nor Apple ever show a phone number** in any real
system alert. On its own, it's the most reliable sign the alert is fake —
and yet almost nobody knows it.

## 3. The call — from victim to unwitting accomplice

Calling, a very convincing "technician" answers. They ask you to install
**legitimate remote-access software** (real tools used daily by actual
tech support) to "diagnose" the problem. The victim, relieved someone is
taking charge, installs it themselves.

## 4. Inside the machine — the "diagnosis" is the real attack

With remote access granted, the fake technician runs a "scan" that always
finds serious (invented) problems, and offers to "fix them" for a
payment — sometimes hundreds or thousands of dollars. In worse cases,
they use the access to steal real banking credentials or install actual
malware.

## 5. The outcome — and who suffers most

In 2023 alone, the FTC estimated **$924 million** in US losses. The FBI
received **19,000 complaints** in just the first half of that year, with
over **$542 million** in losses. Nearly half the victims reported to the
FBI were **over 60** — accounting for **66%** of total losses.

## 🛡️ How to protect yourself from this

- **No real operating system shows a phone number** in its security
  alerts — if you see one, it's a scam, no exceptions.
- If a window "won't let you" close it normally, don't call any number:
  close the whole browser (or restart the machine if needed) instead of
  interacting with the window.
- Never install remote-access software at the request of someone who
  called you, or whom you called after seeing an alert — only do it with
  tech support **you** contacted independently and verified.
