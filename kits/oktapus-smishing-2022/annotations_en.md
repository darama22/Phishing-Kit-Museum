# 0ktapus — teardown

> 📚 Real case, documented by **Group-IB** ("Roasting 0ktapus") and
> officially confirmed by Okta under the name "Scatter Swine":
> [group-ib.com/blog/0ktapus](https://www.group-ib.com/blog/0ktapus/) ·
> [sec.okta.com/articles/scatterswine](https://sec.okta.com/articles/scatterswine/).
> Educational reconstruction — the MFA relay always stays in a local log.

## The vector almost nobody watches

Companies train staff against **email** phishing. Very few train against
the same attack over **SMS**. 0ktapus exploited exactly that blind spot,
at industrial scale: 136 companies, nearly 10,000 credentials.

## 1. The bait — an SMS, not an email

The victim received a text message, usually with a "your session expired,
verify your access" excuse and a link. No spam or odd links in email — a
completely different channel from the one corporate security filters
watch.

## 2. The personalized mask — `original/index.html`

Each fake site was generated **custom to the target company**: same
logo, same name, a domain resembling that organization's real Okta
portal. No generic template — every victim saw "their" company.

## 3. The two-step trap — `original/relay.php`

Here's the most dangerous part: the kit didn't settle for the password.
After capturing it, **it also asked for the MFA code** the victim
received by SMS from their real system — and relayed it to attackers **in
real time**, before it expired (these usually last only a few minutes).
With a valid password + code, attackers logged straight into the real
system, MFA included.

## 4. The chain effect — when the victim is also a provider

Access gained to **Twilio** (an SMS service provider) let attackers, in
later campaigns, **intercept SMS codes meant for other victims** — turning
one breach into infrastructure for the next round of attacks.

## 5. The outcome

**136 organizations** compromised, nearly **10,000 employee credentials**
stolen, mostly tech, software, and cloud-service companies — Twilio,
Cloudflare, MailChimp, and Klaviyo among them.

## 🛡️ How to protect yourself from this

- Train against **SMS phishing just like email phishing** — the channel
  changes, the manipulation is the same.
- Prefer MFA that **doesn't rely on a copyable code** (FIDO2 physical
  keys/passkeys) — an SMS code can always be relayed in real time.
- Be wary of text messages with login links, even when the domain looks
  right at first glance.
