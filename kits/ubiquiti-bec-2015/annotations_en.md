# Ubiquiti Networks — $46.7M without hacking anything — teardown

> 📚 Investigation by **Brian Krebs (KrebsOnSecurity)** and Ubiquiti's own
> 8-K filing with the US SEC:
> [krebsonsecurity.com](https://krebsonsecurity.com/2015/08/tech-firm-ubiquiti-suffers-46m-cyberheist/).
> Educational reconstruction of the emails — with fictional names and
> companies.

## Compared to the Google/Facebook room: the other way to run BEC

You already saw in another museum room how Evaldas Rimasauskas stole
$100 million by registering a **real fake company**. Ubiquiti is the
simpler variant, and just as effective: **it didn't even require setting
up a company** — impersonating by email people the victim already knew
and trusted was enough.

## 1. The bait — two impersonations, not one

Scammers sent emails posing as **two different sources of authority**:
Ubiquiti's own **CEO**, and a **real partner** at a prestigious external
law firm (Latham & Watkins) — giving the instruction extra legal weight,
as if the operation were overseen by outside counsel.

## 2. The trap — `original/fake_ceo_email.html`

The message asked the CFO of the Hong Kong office to authorize urgent
international transfers, with the combined authority of "the boss" and
"the company's lawyers" backing the request.

## 3. Why 14 transfers instead of one

Splitting the fraud into **14 separate operations**, instead of one giant
transfer, makes each individual movement seem more reasonable and less
alarming to any internal control reviewing individual transactions.

## 4. The international leak — hard to recover

The money was sent to accounts spread across **Russia, Hong Kong, China,
Hungary, and Poland** — different jurisdictions that hugely complicate the
legal cooperation needed to trace and freeze funds in time.

## 5. The outcome

A total of **$46,703,232** transferred. Ubiquiti only recovered about
**$8.1 million** — leaving over $38 million in losses.

## 🛡️ How a company protects itself from this

- **Independent-channel verification**, always, for any bank account
  change or international transfer — call a number you already know,
  never the one in the email.
- No executive, however "urgent" the email sounds, should be able to skip
  the normal dual-approval process.
- Be especially wary of instructions combining **authority + urgency +
  confidentiality** ("don't discuss this with anyone else") — the classic
  BEC fraud combination.
