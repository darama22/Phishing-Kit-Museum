# MGM Resorts 2023 — teardown

> 📚 Real case, with technical analysis by **Netwrix, Specops, and
> Virsec**, and The Register's coverage of the Scattered Spider group:
> [specopssoft.com/blog/mgm-resorts-service-desk-hack](https://specopssoft.com/blog/mgm-resorts-service-desk-hack/).
> Educational reconstruction of the call script — no real password-reset
> tooling involved.

## The twist that sets this room apart from Twitter 2020

Both rooms use **vishing** (voice phishing). But there's a key
difference: at Twitter, attackers called **the employee**. At MGM, they
called **the helpdesk**, impersonating the employee — targeting the
people whose job is literally *to help fast*, not to be suspicious.

## 1. The prior recon — `original/linkedin_recon_notes.txt`

Before dialing a number, "Scattered Spider" researched senior MGM Resorts
employees on **LinkedIn** — looking for someone with high privileges
whose name, title, and basic details they could casually cite during the
call.

## 2. The call — `original/index.html`

With that information, they called the **internal IT help desk** and
verbally requested a **phone number/credential reset** for that
high-profile employee — claiming access issues. They spoke fluent, native
English, which reinforced their credibility with support staff.

## 3. Why the helpdesk is such an effective target

The helpdesk's job is to **solve problems fast**, not interrogate
callers. Verifying the identity of someone who sounds convincing and cites
real details (gathered via OSINT) is far harder than spotting a
suspicious link in an email.

## 4. Inside — from one call to total control

With the reset granted, attackers gained access to MGM's **Okta**
environment with **super-admin** privileges, enabling unauthorized single
sign-on into **Microsoft Azure** and over **100 ESXi hypervisors**. They
also created a second identity-provider app under their control, as a
backup plan in case they lost initial access.

## 5. The outcome

Slot machines offline, digital room keys unusable, reservation systems
down for days. The **ALPHV/BlackCat** ransomware group encrypted systems
after the initial intrusion, and Scattered Spider claimed to have stolen
6 terabytes of data.

## 🛡️ How an organization protects itself from this

- **Robust helpdesk verification**: any reset for accounts with elevated
  privileges should require verification through an independent channel
  (video call with camera, manager approval), never just "sounding
  convincing" on the phone.
- Specifically train **support staff** against social engineering — they
  are high-value targets precisely because their job is to help fast.
- Apply **least-privilege** principles: a single reset should never be
  able to cascade into super-admin privileges without additional steps.
