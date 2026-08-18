# The tax-season phishing epidemic — teardown

> 📚 Real pattern, with an official **IRS (Security Summit)** alert and
> investigation by **Brian Krebs**:
> [krebsonsecurity.com](https://krebsonsecurity.com/2017/02/irs-scam-blends-ceo-fraud-w-2-phishing/).
> Educational reconstruction of the email — with fictional names and
> company.

## The same BEC scam, knocking on a different door

You've already seen the classic BEC targeting **Finance** in the museum
(Rimasauskas, Ubiquiti). This room shows the variant that found a
different, equally effective door: **HR/payroll**, a department almost
nobody had trained against this kind of fraud in 2016.

## 1. The target — not money, everyone's tax data

The email, impersonating the company's real CEO or CFO, didn't ask for a
wire transfer — it asked for **W-2 forms** for every employee: name,
Social Security number, address, that year's salary. With that, an
attacker can file fraudulent tax returns in the name of **every
employee**, all at once.

## 2. The bait — `original/index.html`

Timing was key: the email arrived right in **January/February**, exactly
when requesting a W-2 from payroll is a **completely normal, expected**
request at any company — nothing to raise suspicion on its own.

## 3. Why HR and not Finance

In 2016, most BEC fraud training focused on the finance department —
"watch out for wire transfer requests." Nobody had thought to train
payroll against requests for **documents**, not money. Scammers found
the blind spot.

## 4. The outcome — an epidemic, not an isolated case

The IRS received **over 1,000 reports** in January 2016 alone, with a
**400%** year-over-year increase in the first half of that season. Known
affected companies included Seagate Technology, Moneytree, and Sprouts
Farmers Market. The pattern later spread to school districts, tribal
casinos, and restaurant chains — and in some cases, after obtaining the
W-2s, scammers sent a **second request** also asking for a wire transfer.

## 🛡️ How an organization protects itself from this

- Train **every department with access to sensitive data** (HR, payroll,
  legal), not just Finance — any department can be the chosen target.
- Establish that **no mass request for employee data** gets processed
  without independent-channel verification, no matter how much it looks
  like it's from the CEO.
- If your company suffers this, notify the **IRS** (or your relevant tax
  authority) immediately — fast reporting helps mitigate the resulting
  tax fraud.
