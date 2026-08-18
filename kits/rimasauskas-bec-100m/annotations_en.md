# The man who scammed Google and Facebook out of $100 million — teardown

> 📚 Real case, documented by the **US Department of Justice** (charges,
> guilty plea and sentencing), with coverage by BleepingComputer, CNBC and
> NPR:
> [bleepingcomputer.com](https://www.bleepingcomputer.com/news/security/lithuanian-pleads-guilty-to-stealing-100-million-from-google-facebook/) ·
> [npr.org](https://www.npr.org/2019/03/25/706715377/). This room's
> documents are an **educational reconstruction**, with a fictional company
> and figures — no real document from the case is reproduced.

## Why this room is unlike any other

There's no cloned HTML. No JavaScript capturing passwords. **This is the
most expensive phishing case in the museum, and it didn't need a single
line of code** — just perfectly forged paperwork and a lot of patience.
It's called **BEC** (Business Email Compromise).

## 1. The setup — a fake company, but really registered

Evaldas Rimasauskas didn't build a fake website: he **legally registered a
company** with the same name as a real hardware manufacturer that already
did business with Google and Facebook (Quanta Computer). It wasn't a
similar-looking domain — it was a real company, with real paperwork, that
simply **wasn't who it claimed to be**.

## 2. The bait — `original/fake_invoice.html`

With that company as a front, he sent **forged invoices** to specific
employees in Google's and Facebook's payments departments — exactly the
kind of invoice those companies already expected from that vendor, for the
right amount, with the right reference.

## 3. The detail that makes it brilliant (and terrifying)

He didn't stop at the invoice. He fabricated:
- **Contracts** with forged signatures from real executives.
- **Letters** that appeared to come from legitimate company agents.
- **Fake corporate seals**, engraved with the real names of Google,
  Facebook and the impersonated vendor — designed specifically to get the
  paperwork past banks' internal checks when processing such large
  transfers.

## 4. Why it worked for almost two years (2013-2015)

Each element on its own was credible: a real company, invoices for the
expected amount, contracts with the "right" signature. The employees
approving payments had no reason to doubt — everything matched what they
already knew about their relationship with that vendor.

## 5. The leak — `original/spoofed_wire_instructions.txt`

The "theft" here isn't a form capturing a password: it's the **wire
transfer itself**, which victims voluntarily authorize believing they're
paying their real vendor, while the money actually goes to accounts
controlled by the scammer — spread across several countries to make
tracing harder.

## 6. The outcome

Rimasauskas defrauded **~$23 million from Google** and **~$99 million
from Facebook**. He pleaded guilty to wire fraud, aggravated identity
theft and money laundering; he was sentenced to **5 years in prison**,
with an order to forfeit nearly $50 million and pay over $26 million in
restitution. Google recovered all its money; Facebook recovered most of
it.

## 🛡️ How a company protects itself from this

- **Verification through a separate channel**: any change to a vendor's
  bank account must be confirmed by phone, using a number you already had
  on file — never the one listed in the email itself.
- **Mandatory dual approval** for large transfers, with different people
  verifying each part.
- Be wary of "urgency" — BEC scammers typically pressure victims with
  tight deadlines so there's no time to calmly verify.
