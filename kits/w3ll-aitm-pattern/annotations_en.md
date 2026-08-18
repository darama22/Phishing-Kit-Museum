# W3LL / OV6 — teardown

> 📚 Based on public research by **Group-IB**, *"W3LL Done: Uncovering
> Phishing Ecosystem Behind BEC Attacks"*:
> [group-ib.com/resources/research-hub/w3ll-phishing](https://www.group-ib.com/resources/research-hub/w3ll-phishing/).
> A large-scale real case, later dismantled by the **FBI** and Indonesian
> police. This kit's code is an **educational reconstruction** of the
> documented mechanism, not the original kit.

## Why this is the museum's most important room

Every kit so far stole **passwords**. This one shows why that's no longer
enough for a serious attacker: **it steals the already-authenticated
session, after you've passed 2FA.** It's the technique that genuinely
worries any security team today.

## 1. What "Adversary-in-the-Middle" (AiTM) means

Instead of showing you an isolated fake site, the kit places itself **as a
real intermediary** between you and Microsoft:

```
You  →  [attacker's server, acting as proxy]  →  Microsoft (real)
     ←                                        ←
```

You type your username, your password, **and your 2FA code** — and all of
it genuinely travels to Microsoft, which authenticates you normally. The
difference is that the attacker, sitting in the middle, **sees the session
cookie** Microsoft hands back after you successfully authenticate.

## 2. The trap — `original/proxy_relay.php`

The "kit" here isn't just static HTML: it's an **active proxy** that:
1. Forwards every one of your requests to the real Microsoft.
2. Forwards every Microsoft response back to you (which is why everything
   *works* normally — nothing looks "off" to notice).
3. When Microsoft issues the final session cookie, the proxy makes a
   **copy** before handing it back to you.

## 3. Why this breaks 2FA

With that stolen cookie, the attacker can get into your account **without
ever asking for your password or second factor again** — the session is
already authenticated. 2FA protects the *moment of login*, but not a
session that already passed that moment and got intercepted along the way.

## 4. It wasn't just a kit — it was a criminal company

Group-IB documented a full ecosystem behind W3LL with **16 additional
tools** sold alongside the panel: mass email sending (SMTP senders), a
vulnerability scanner to find targets, link-redirection tools, automated
account reconnaissance... A phishing kit turned into a complete BEC
(Business Email Compromise) attack suite.

## 5. The outcome

The investigation estimated **~56,000 Microsoft 365 accounts targeted**
and **~8,000 compromised**, with associated fraud worth **$20 million**.
After the research was published, the **FBI** and Indonesian police carried
out a takedown of the infrastructure.

## 🛡️ How to protect yourself (regular 2FA is NOT enough here)

- Use **physical security keys (FIDO2/passkeys)** where possible — unlike a
  code, they're bound to the real domain and an AiTM proxy can't steal
  them.
- Be suspicious of logins that "take a bit longer" or redirect several
  times.
- Organizations should monitor logins from unusual locations or devices
  **even for already-authenticated sessions**.
