<div align="center">
  <img src="https://drive.google.com/uc?id=18-JRzH3pre2b-RFjk4qlPNCVmI5h38xg" alt="Project Header" width="100%" />
</div>
<br/>
<div align="center">
  <img src="https://img.shields.io/badge/Status-Completed-4ade80?style=for-the-badge&labelColor=1a1a1a" />
  &nbsp;
  <img src="https://img.shields.io/badge/Stack-PHP%20%2B%20MySQL%20%2B%20WordPress-6ab4f5?style=for-the-badge&labelColor=1a1a1a" />
  &nbsp;
  <img src="https://img.shields.io/badge/Type-Social%20Impact%20%2B%20Business%20Analysis-a78bfa?style=for-the-badge&labelColor=1a1a1a" />
</div>

---

## ✦ Business Context

The Mercado Solidário ("Solidarity Market") is a community initiative in Tatuí, SP, that collects food donations and distributes them to registered low-income families. Families earn points by participating in community activities and use those points to "shop" at the market, preserving dignity and agency in the process.

**The problem:** the entire operation ran manually. Donor registration, family enrollment, stock control, and point calculation were managed through spreadsheets and informal records, creating bottlenecks, data inconsistencies, and a near-total lack of visibility into the program's reach and impact.

**The business question:** how do you digitize the operational backbone of a community program with multiple stakeholder groups (donors, families, volunteers, administrators), limited technical resources, and zero tolerance for data errors that could affect vulnerable families?

---

## ✦ Stakeholder Mapping

| Stakeholder | Primary need | Pain point before the system |
|---|---|---|
| Families in need | Register and "shop" at the market | No digital registration; manual, error-prone process |
| Donors | Know how and what to donate | No clear channel; relied on word-of-mouth |
| Volunteers | Sign up and coordinate activities | No centralized sign-up; managed via WhatsApp |
| Market administrator | Manage stock and calculate family points | Manual spreadsheet; high risk of calculation errors |

---

## ✦ Requirements

The solution needed to serve four distinct user groups through two separate interfaces: a public-facing website and a restricted admin panel.

**Functional requirements — public website**

| ID | User Story |
|----|-----------|
| F01 | As a donor, I want to understand what items are needed so I can make a relevant donation |
| F02 | As a donor, I want to know where and how to deliver my donation |
| F03 | As a volunteer, I want to sign up for activities directly on the site |
| F04 | As a family in need, I want to register my household to access the market |
| F05 | As a visitor, I want to understand the program and how it works |

**Functional requirements — admin panel**

| ID | User Story |
|----|-----------|
| A01 | As an administrator, I want to view all registered families in real time |
| A02 | As an administrator, I want to calculate and update each family's points based on activity participation |
| A03 | As an administrator, I want to manage product stock: add, update, and track available items |
| A04 | As an administrator, I want to consult individual family data quickly |

**Non-functional requirements**

- Responsive layout (mobile-first: families and donors primarily access via smartphone)
- Real-time data queries: no page refresh required for admin consultations
- Low-cost infrastructure: solution must run on shared hosting, no dedicated server

---

## ✦ Process: AS-IS vs. TO-BE

**Before the system (AS-IS):**

```
Donor wants to donate
  → Calls someone they know → Gets redirected → Drops off without registration
  → No record of donation in the system

Family wants to register
  → Fills paper form → Handed to volunteer → Manually entered into spreadsheet
  → Points calculated manually by admin each month (high error risk)

Administrator needs stock view
  → Opens spreadsheet → Cross-references with handwritten entries
  → No real-time visibility; decisions based on outdated data
```

**After the system (TO-BE):**

```
Donor visits website
  → Reads what's needed → Finds drop-off info → Optionally registers online

Family registers online
  → Form submits directly to database → Admin sees it immediately
  → Points calculated automatically based on activity log

Administrator opens admin panel
  → Real-time family list → One-click point calculation → Live stock management
```

---

## ✦ Solution

A two-interface web platform built in PHP, MySQL, JavaScript, and WordPress:

**Public website**
- Program presentation and how-it-works explanation
- Donation guide (accepted items, drop-off locations)
- Volunteer sign-up form
- Family registration form (feeds directly to the admin database)

**Admin panel**
- Real-time table of registered families with search and filter
- Automated point scoring based on configurable participation rules
- Stock management: add, edit, and track available market inventory

**Design:** mockups created in Figma before development; responsive layout built with Bootstrap for mobile compatibility.

---

## ✦ Features

- Responsive layout (mobile-first)
- Online family registration with direct database integration
- Real-time family data consultation
- Automated point calculation for registered families
- Full stock management for market administrators

---

## ✦ Tools Used

<p align="left">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg" alt="mysql" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" alt="bootstrap" width="40" height="40"/>
  <img src="https://www.vectorlogo.zone/logos/figma/figma-icon.svg" alt="figma" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/wordpress/wordpress-original.svg" alt="wordpress" width="40" height="40"/>
</p>

---

## ✦ Decisions & Trade-offs

| Decision | Chosen | Discarded | Reason |
|---|---|---|---|
| CMS | WordPress (partial) | Custom CMS | Faster to deploy; administrators non-technical |
| Database | MySQL | NoSQL | Relational model fits structured family/stock/points data |
| Infrastructure | Shared hosting | Cloud/VPS | Zero budget; shared hosting sufficient for traffic volume |
| Mobile strategy | Responsive (Bootstrap) | Native app | Faster to build; families access via browser, not app stores |

**Known limitations:**
- Admin panel has no role-based access control (single admin user)
- Point calculation rules are hardcoded; changing them requires a developer
- No automated backup system implemented at launch

---

## ✦ Impact

- Replaced a fully manual registration and stock management process
- Enabled real-time visibility into enrolled families and market inventory
- Removed calculation errors from the family scoring process
- Created a public digital presence for a program that previously relied entirely on word-of-mouth

---

## ✦ Authors

- [@devleticiastahl](https://www.github.com/devleticiastahl) — Business analysis, requirements, design (Figma), frontend
- [@edunucleo](https://www.github.com/edunucleo) — Backend development (PHP, MySQL)

---

## ✦ License

This project was built for social impact and is shared for reference. Please reach out before reusing any part of it commercially.

---

<sub>☕︎ Made with purpose in Tatuí, SP</sub>
