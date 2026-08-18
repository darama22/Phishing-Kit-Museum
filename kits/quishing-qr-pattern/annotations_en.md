# Quishing — the sticker-based phishing — teardown

> 📚 Pattern documented in public **FBI (IC3)** alerts about parking
> meters and EV chargers, with growth data collected by Synovus and
> DeepStrike. Educational reconstruction — no real QR code pointing to
> any external site.

## The room that steps outside the screen

Every room in the museum so far lived inside an email, a call, or a
browser. This is the first one that **exists in the physical world**: a
simple paper sticker, stuck onto a parking meter, on the street.

## 1. The bait — you don't even need to hack anything

The technical "attack" is astonishingly simple: someone **prints a
sticker** with a fake QR code and sticks it **over** the legitimate QR
code on the parking meter or EV charger. There's no system to compromise
— just a printer and glue.

## 2. Why a QR code is more dangerous than a text link

A written link you can **read** before clicking — you can notice
something's off about the domain. A QR code is, by design, **opaque to
the human eye**: nobody can "read" at a glance where a QR code leads
before scanning it. The suspicion you'd normally apply to a shady link
simply never gets the chance to trigger.

## 3. The trap — `original/index.html`

Once scanned, the victim lands on a page mimicking their city's
**official parking payment portal** — same look, same urgency ("pay now
or receive a fine"). They enter their card details, believing they're
paying for an hour of parking.

## 4. Why it dodges corporate defenses

Many companies automatically scan text-based links in email or
messaging for phishing. But a link **embedded inside an image** (the QR
code itself) is far harder to analyze automatically — quishing slips in
through exactly that blind spot.

## 5. The outcome — explosive growth

Quishing went from an anecdote (0.8% of phishing attacks in 2021) to
**12.4%** in 2023, with a reported **587%** growth between 2023 and
2024. Police in several US and UK cities have had to physically remove
fraudulent stickers from real parking meters.

## 🛡️ How to protect yourself from this

- Before scanning a QR code on the street, **visually check** whether it
  looks like a sticker placed over something else (edges, misalignment,
  different paper type).
- Many phones show the **destination URL before opening the link** when
  you scan — read it as carefully as you would an email link.
- For parking payments, prefer your city's **official app** or type the
  URL yourself, instead of scanning a QR code on a street pole.
