# The email that ended up shaping an election — teardown

> 📚 Real case, widely documented and attributed by **SecureWorks** to
> **Fancy Bear** (linked to Russian military intelligence, the GRU), with
> coverage by CNN, Sophos and Motherboard:
> [cnn.com](https://www.cnn.com/2016/10/28/politics/phishing-email-hack-john-podesta-hillary-clinton-wikileaks) ·
> [sophos.com](https://news.sophos.com/en-us/2016/12/16/dnc-chief-podesta-led-to-phishing-link-thanks-to-a-typo/).
> This room's files are an **educational reconstruction** of the
> mechanism, with fictional domains and text — not the original email.

## Why this room is different from all the others

No other room in the museum has consequences like this one: **this
phishing email ended up part of the public debate around a US
presidential election.** No money was stolen — thousands of private emails
from a presidential campaign were published weeks before the 2016 vote.

## 1. The victim wasn't just anyone

John Podesta was Hillary Clinton's **campaign chairman**. There was no need
to breach an entire bank — just **one well-chosen Gmail account** gave
access to sensitive internal communications from an entire presidential
campaign.

## 2. The bait — `original/fake_security_alert.html`

The email didn't ask for money or prizes — it played on **fear, not
greed**. It impersonated a legitimate Google security alert:

> *"Someone just used your password to try to sign in to your account
> from [location]. Google stopped this sign-in attempt. Change your
> password now."*

It's a brilliant bait precisely because **clicking feels responsible** —
it feels like you're protecting yourself, not risking anything.

## 3. Industrial scale, not a lone email

This wasn't a single-email attack. The research found the same group
generated close to **9,000 shortened links (Bitly)** aimed at roughly
**4,000 different targets** between 2015 and 2016 — each link personalized
with that specific victim's name and email. Podesta was one of thousands.

## 4. The detail that decided history — a typo

When Podesta forwarded the suspicious email to a campaign IT aide asking if
it was legitimate, the reply should have said *"this is an illegitimate
email."* The aide instead typed, by mistake, *"this is a legitimate
email"* — **accidentally dropping the key word.** Podesta, trusting that
reply, clicked and changed his password on the fake page.

One single typo, under the pressure of a campaign, changed everything that
followed.

## 5. The final trap — `original/fake_login.html`

After the click, the victim landed on a page mimicking Google's login. Once
they typed their password there, it was in the attacker's hands — the same
capture mechanism you see in the museum's other rooms, applied here against
a top-tier political target.

## 6. The outcome

The stolen emails from Podesta's account (and other accounts compromised
in the same Fancy Bear campaign) were published by WikiLeaks in the weeks
leading up to the 2016 US election, becoming a central topic of the
campaign's news coverage.

## 🛡️ Why this case matters especially

It shows phishing isn't just a "stolen money" problem — it's a vector
capable of shifting the course of real historical events when the target
is significant enough. And it shows that **even experienced people,
surrounded by security advisors, can fall for it** when a well-crafted
message combines with a simple human error under pressure.
