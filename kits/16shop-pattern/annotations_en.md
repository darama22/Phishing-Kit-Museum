# 16Shop — teardown

> 📚 Based on public research by **Trend Micro**, in partnership with
> **Interpol**: [trendmicro.com — Revisiting 16shop Phishing Kit](https://www.trendmicro.com/en_us/research/23/i/revisiting-16shop-phishing-kit-trend-interpol-partnership.html).
> A real case with **confirmed arrests**. This kit's code is an
> **educational reconstruction** of the documented panel, not the original
> kit.

## The step up: from "a script" to "a business"

Earlier rooms showed loose kits, built by an attacker for their own use.
**16Shop is a different animal: a commercial product.** Active since 2018,
it was sold to other criminals as *phishing-as-a-service* — you didn't
need to know how to code, just buy access to the panel.

## 1. The panel — `original/panel_config.php`

The buyer logged into an admin panel and picked:
- **Which brand to impersonate**: Apple, Amazon, PayPal, DHL, American
  Express...
- **A different price per brand** — American Express was the most
  expensive option, likely because its "premium" cardholders are a more
  profitable target for the attacker.
- **The message language**, based on the country it would be distributed
  in.

With that choice, the panel automatically generated the ready-to-deploy
phishing package — the buyer just had to upload it to a server.

## 2. Multi-language via config — `original/verify.ini`

Instead of coding a separate site per language, the kit uses a config file
(`verify.ini`) with texts already translated. Switching from "attack
victims in Spain" to "attack victims in Japan" was as simple as changing a
parameter, not rewriting code.

## 3. Anti-piracy protection (between criminals themselves)

A curious detail: the kit included a **license tied to the buyer's
machine** — the kit's own creator protected their "product" so other
criminals couldn't just copy it for free. Fraud protecting fraud.

## 4. The ending — how a phishing empire falls

In 2021, 16Shop's peak year of activity, one of its main administrators
was **arrested**, in a joint operation by Indonesian and Japanese police
and **Interpol**, with technical support from Trend Micro. After that
arrest (and follow-up arrests), 16Shop stopped operating.

## 🛡️ Why this case matters

It shows that modern phishing **isn't always run by a single technical
attacker** — there's a whole industry of "suppliers" selling the kit to
less-skilled third parties. And it also shows that **these cases do get
resolved**: collaboration between private researchers and international
police leads to real arrests.
