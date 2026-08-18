# AOHell — the origin of the word "phishing" — teardown

> 📚 Academic research by **Koceilah Rekouche**, AOHell's own creator,
> published decades later under his real name:
> ['Early Phishing' (arXiv)](https://arxiv.org/abs/1106.4692).
> Educational reconstruction with no real card generator or functional
> tool from that era.

## Why this is the museum's founding room

Every other room — from a fake Google email to a proxy stealing
Microsoft 365 sessions — is a **variation on an idea born here, in 1995**,
in AOL chat rooms. Literally: the word "phishing" was first documented
describing exactly this.

## 1. The creator — a teenager, not a criminal organization

AOHell was written by a 17-year-old high school student, under the
pseudonym *"Da Chronic."* There were no organized crime rings, no
nation-states, no "phishing-as-a-service" companies — just teenage
curiosity and a design flaw in a new, massive service.

## 2. The bait — `original/aol_chat_mock.html`

The "kit" wasn't a website — it was a **chat or AOL Instant Messenger
message**, posing as an AOL employee, asking you to "confirm" your
account password or credit card details. No cloned pages at all: **pure
social engineering was enough**, because nobody expected this kind of
trick yet.

## 3. The cleverest detail — free accounts to attack from

AOHell exploited a flaw in the algorithm AOL used to generate/validate
credit card numbers for new sign-ups. The program **generated "valid"
numbers per that algorithm** (not real cards belonging to anyone), and
used them to open free, disposable AOL accounts — perfect for launching
the attack without leaving a trace tied to a real account.

## 4. Why the name "phishing" has a "ph"

The spelling comes directly from **"phreaking,"** the culture of
manipulating phone systems to make free calls in the 70s and 80s — the
community much of the first generation of internet hackers came from.
"Phishing" was first documented on the Usenet group `alt.2600`, a classic
gathering spot for that same culture.

## 5. The legacy — 30 years later

Everything you've seen in the rest of the museum — cloned sites, OAuth
abuse, vishing, AiTM, million-dollar BEC — is the **same idea from 1995**,
each time with more technical sophistication but exactly the same core:
pose as someone trustworthy so the victim hands something over
themselves.

## 🛡️ The lesson that never expires

No new technology fully solves this, because the target was never a
computer system — **it has always been a person trusting the wrong
authority.** Same lesson in 1995 as in 2025.
