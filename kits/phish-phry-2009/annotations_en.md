# Operation Phish Phry — teardown

> 📚 Real case, officially documented by the **FBI**:
> [fbi.gov — Operation 'Phish Phry'](https://www.fbi.gov/news/stories/2009/october/phishphry_100709).
> At the time, the largest cybercrime case ever brought: **100
> defendants** across the US and Egypt. This room's files are an
> **educational reconstruction** of the mechanism, with no real accounts
> or data.

## Why this room completes the museum

Every earlier room explains **how a credential gets stolen.** This one
explains what almost none of the others cover: **what happens to the
money afterward.** Bank phishing doesn't end when someone types their
password into a fake site — that's only where the second half of the
crime begins.

## 1. The capture — `original/fake_bank_login.html`

Like the "Phish in a Barrel" room, everything starts with a mass email
and a cloned banking site. Nothing technically new — the interesting part
comes next.

## 2. Division of labor — two countries, two roles

The operation was organized into two groups that **never saw the whole
process**:
- In **Egypt**, one group hacked bank accounts and captured credentials.
- In the **United States**, another group received those credentials and
  handled **pulling the actual money** out of US banks.

This split wasn't accidental: if someone on one side gets arrested, they
can't rat out the other side, because they don't even know how it works.

## 3. The "money mules" — `original/mule_recruitment_flyer.txt`

The most important piece of the machine: the **runners**. People
recruited (sometimes without fully knowing what they were getting into)
to open real bank accounts **in their own name**. Stolen money was
transferred there first — then those people withdrew it in cash or
forwarded it, in exchange for a cut.

**Why it works:** a bank sees a transfer between two "normal" real
customer accounts, not a direct theft — much harder to detect and stop in
time.

## 4. The final leg — back to Egypt

Money that reached the mules' accounts was **split into smaller amounts**
and sent via international transfer services back to Egypt — broken up
specifically to avoid triggering large-transaction bank alerts.

## 5. The outcome

A joint investigation by the **FBI** and Egyptian authorities: **53
defendants in the US and 47 in Egypt**, with estimated losses over $1.5
million. Several ringleaders were sentenced to up to 13 years in prison.

## 🛡️ Why this case matters especially

It teaches that fighting phishing isn't just "detecting the fake site" —
there's a whole organized criminal economy behind it, with specialized
roles, borders that make legal prosecution harder, and a laundering layer
specifically designed to make the money (and the responsibility) nearly
impossible to trace back to the source.
