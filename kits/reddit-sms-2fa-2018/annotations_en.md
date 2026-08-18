# Reddit 2018 — SMS interception — teardown

> 📚 Real case, with an official Reddit statement and technical analysis
> by **Krebs on Security**:
> [krebsonsecurity.com](https://krebsonsecurity.com/2018/08/reddit-breach-highlights-limits-of-sms-based-authentication/).
> Educational reconstruction of the concept — no real carrier
> manipulation involved.

## The room that proves "having 2FA" isn't a guarantee

Reddit **had** two-factor authentication enabled on employee accounts.
And they still suffered a breach. This room explains why the **type** of
2FA matters just as much as having it at all.

## 1. The target wasn't the password

Unlike almost every other room, the problem here wasn't stealing a
password — it was likely already compromised through another route. The
specific target was the **second factor**: the one-time code sent via
SMS.

## 2. How an SMS gets intercepted without touching the phone

Reddit itself admitted not knowing (or not revealing) the exact method.
But security experts point to the most likely technique: **SIM
swapping** — convincing the victim's mobile carrier, through social
engineering, to transfer their number to a SIM card controlled by the
attacker. From that point on, all SMS messages — including verification
codes — go straight to the attacker.

## 3. Why this is so hard for the victim to defend against

The victim's phone was **never hacked**. The manipulation happened
entirely on the **carrier's** side, a system completely outside the
affected person's control. No antivirus or personal best practice fully
shields against this.

## 4. The case's central irony

SMS-based 2FA exists precisely to **add** security beyond the password.
Here, that second factor turned out to be the **weakest link** in the
entire chain — while employees' passwords stayed perfectly protected.

## 5. The outcome

Attackers accessed source code, internal logs, config files, and a
**2005-2007 backup** with usernames, hashed passwords, emails, and
private messages from that era. Reddit responded by requiring
**token-based or authenticator-app 2FA**, never SMS, for all employees.

## 🛡️ How to protect yourself from this

- Avoid SMS-based 2FA when you have an alternative: use **authenticator
  apps** (Google Authenticator, Authy) or, better yet, **FIDO2 physical
  keys/passkeys** — neither depends on your mobile carrier.
- Ask your carrier whether they offer an **additional PIN or password**
  for any number change or porting — it's your main defense against SIM
  swapping.
- If your phone suddenly loses signal for no apparent reason, **act
  fast** — it can be the first sign of an ongoing SIM swap.
