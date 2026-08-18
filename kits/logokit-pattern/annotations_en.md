# LogoKit — teardown

> 📚 Based on public research by **RiskIQ / Microsoft (2021)**, covered by
> Threatpost and SecurityAffairs, with a later update documented by
> **Resecurity**:
> [threatpost.com — LogoKit Simplifies Office 365/SharePoint Login Phishing](https://threatpost.com/logokit-simplifies-office-365-sharepoint-login-phishing-pages/163430/).
> This kit's code is an **educational reconstruction** of the documented
> mechanism, not the original kit.

## The idea that makes it special

Every earlier kit needed **each brand cloned by hand**: a folder of
HTML/CSS per bank, per store, per impersonated service. LogoKit solves that
with a very simple, clever idea: **why clone the logo when you can just
borrow it in real time?**

## 1. One URL, one victim, one brand — `original/index.html`

The link the victim receives by email isn't just a link: it carries
**their email embedded as a parameter**, for example:

```
https://deployed-kit.example/login?e=victim@company.com
```

The same HTML page serves any victim — what changes is what the
JavaScript does **after** it loads.

## 2. The logo trick — `original/dynamic.js`

On load, the script:
1. Reads the victim's company domain from their email
   (`company.com` in the example above).
2. Requests that company's logo from a **public, legitimate service** —
   the Clearbit Logo API or Google's favicon lookup — services meant for
   developers to easily show any company's logo, not for phishing.
3. Injects that real logo into the page on the fly.
4. **Autofills the email field** with the victim's, read from the URL.

The result: the victim sees *their own company*, *their own email already
typed in*, with the correct logo — without the attacker having prepared
anything specific for that particular victim.

## 3. Why it's so hard to detect

Since the logo is fetched from a **legitimate** service (Clearbit, Google)
rather than hosted by the kit itself, filters that look for "known phishing
images" find nothing suspicious — the image is 100% real, just used with
bad intent.

## 4. The evolution — real screenshots in the background

Later research (Resecurity) documented variants that go a step further:
using an external service (**Thum.io**) to generate a **real screenshot**
of the target company's website as the background, making the deception
visually almost indistinguishable from the real site.

## 5. The leak — `original/dynamic.js` (continued)

As soon as the victim submits their password, the script fires a
**background AJAX request** (no page reload) to the attacker's server,
then redirects to the real corporate site — the same "don't get
suspicious" pattern seen in other rooms, but executed client-side instead
of server-side.

## 🛡️ Why this case matters especially

It teaches that **"the image is the real logo" doesn't mean "the site is
real."** The one reliable signal remains **the exact URL domain**, never
how official, personalized, or perfect the page looks.
