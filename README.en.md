<div align="center">

# 🎣 PHISHING KIT MUSEUM 🎣

### An interactive social-engineering museum — 30 real cases, 1989 to 2024

[🇪🇸 Español](README.md)  ·  **🇬🇧 English**

![Rooms](https://img.shields.io/badge/ROOMS-30-0ea5e9?style=for-the-badge&labelColor=black)
![Defanged](https://img.shields.io/badge/CODE-DEFANGED-16a34a?style=for-the-badge&labelColor=black)
![Runnable](https://img.shields.io/badge/DEMOS-100%25_FUNCTIONAL-f59e0b?style=for-the-badge&labelColor=black)

![Bilingual](https://img.shields.io/badge/i18n-ES_·_EN-0ea5e9?style=flat-square&labelColor=0d1117)
![Era](https://img.shields.io/badge/ERA-1989→2024-0ea5e9?style=flat-square&labelColor=0d1117)
![Stack](https://img.shields.io/badge/STACK-Python_·_PHP-0ea5e9?style=flat-square&labelColor=0d1117)
![Risk](https://img.shields.io/badge/RISK-ZERO-16a34a?style=flat-square&labelColor=0d1117)

</div>

---

> ⚠️ Educational / awareness purposes only. Every kit is **defanged**: no
> real functional backend, no victim data, no network call ever leaves
> your own machine. See [RULES.md](RULES.md).

## 🧬 What this is

A local museum where every room **tears down a real, documented** case of
phishing/social engineering — with its source cited (FBI, Group-IB,
Krebs, US Department of Justice...), its technical mechanism explained,
and **code you can genuinely run on your own machine** with one button.

These aren't screenshots. Not summaries. It's the full flow working —
forms that capture, anti-bot filters that really block, a proxy that
intercepts a session — with the "theft" always staying in a local text
file, never touching the internet.

## ⚡ Capabilities

| Module | Description |
|--------|-------------|
| 🏛️ **30 documented rooms** | From AOHell (1995, origin of the word "phishing") to real-time video deepfakes (2024). Every room cites its source. |
| 🚀 **"Spin up room" button** | Starts a real PHP server, only on `127.0.0.1`, and opens the tab for you — no terminal needed. |
| 🔐 **Defanged by design** | Zero real external-domain calls across all 30 rooms (audited). The "theft" stays in a local log, never leaves your disk. |
| 🌐 **Bilingual ES/EN** | UI and all 30 full technical teardowns available in both languages, with a switch built into the app. |

## 🗺️ The 30 rooms

| Room | Year | Source |
|------|:---:|--------|
| 419 fraud | 1989 | historical (Spanish Prisoner scam) |
| AOHell — origin of "phishing" | 1995 | Rekouche (arXiv) |
| Operation Phish Phry (100 defendants) | 2009 | FBI |
| RSA SecurID | 2011 | Threatpost |
| $100M from Google/Facebook | 2013 | DOJ |
| Target / Fazio (HVAC) | 2013 | Krebs |
| Phish in a Barrel | 2014 | Duo Security |
| Sony Pictures | 2014 | RSA Conference |
| Ubiquiti BEC ($46.7M) | 2015 | Krebs |
| Anthem (78.8M records) | 2015 | DOJ |
| Bangladesh Bank ($81M) | 2016 | CSO Online |
| Podesta / DNC 2016 | 2016 | SecureWorks |
| W-2 tax phishing | 2016 | IRS |
| Google Docs OAuth worm | 2017 | Netskope |
| 16Shop (with arrests) | 2018 | Trend Micro / Interpol |
| MyEtherWallet (BGP hijack) | 2018 | BleepingComputer |
| Reddit (SIM swap) | 2018 | Krebs |
| Twitter VIP (vishing) | 2020 | NY DFS |
| LogoKit | 2021 | RiskIQ / Microsoft |
| 0ktapus (smishing) | 2022 | Group-IB |
| Ronin / Axie ($625M) | 2022 | Chainalysis |
| Uber (MFA fatigue) | 2022 | Dark Reading |
| Antibot + Telegram | 2022 | SiteLock |
| W3LL / OV6 (MFA bypass) | 2023 | Group-IB / FBI |
| MGM / Scattered Spider | 2023 | Specops |
| Quishing (QR) | 2023 | FBI IC3 |
| Pig Butchering | 2023 | US Secret Service |
| Tech support scam | 2023 | FBI / FTC |
| Arup (deepfake, $25M) | 2024 | Hong Kong Police |
| SecureBank Demo | — | project template |

## 🚀 Boot

```bash
cd app
python3 indexer.py     # builds the index from kits/
python3 server.py      # ▶ http://127.0.0.1:5058
```

Inside each room, the **🚀 Spin up room** button starts the real PHP
server for you — or do it by hand, see [HOW_TO_RUN_LOCALLY.md](HOW_TO_RUN_LOCALLY.md).

## 🗺️ Structure

```
Phishing Kit Museum/
├── RULES.md                 # non-negotiable rules (read first)
├── HOW_TO_RUN_LOCALLY.md
├── kits/<room>/
│   ├── meta.json            # entry (ES/EN), local port, source
│   ├── annotations.md / _en.md
│   └── original/            # real, defanged code
└── app/                      # Flask engine (indexer, server, i18n)
```

## 🧾 Provenance

Every room reconstructs a mechanism **publicly documented** by
researchers or authorities — it never copies a stolen kit or real victim
data. See the cited source in each `meta.json`.

---

<div align="center">

### ⚖️ LEGAL NOTICE

**Strictly for educational and cybersecurity research purposes.**
No kit in this museum has a functional backend against a real target.

☣️

</div>
