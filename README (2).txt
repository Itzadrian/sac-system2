===========================
SSNS - Student Security Numbering System
===========================

Author: Simeon Nzube DOminic
Date: 9th June 2025
Project Folder: sac-system2

------------------------------------------
📦 CONTENTS OF THIS PACKAGE
------------------------------------------
1. PHP Project Files (in sac-system2 folder)
2. MySQL Database Export (sac_system.sql)
3. This README.txt

------------------------------------------
⚙️ SETUP INSTRUCTIONS
------------------------------------------

1. REQUIREMENTS
---------------
- XAMPP (or any local server with PHP & MySQL)
- Web browser (e.g., Chrome)

2. SETUP PROJECT FILES
-----------------------
- Extract the ZIP archive.
- Move the `sac-system2` folder to your local server directory:
  Example: C:\xampp\htdocs\sac-system2

3. IMPORT DATABASE
------------------
- Start Apache and MySQL from XAMPP control panel.
- Open your browser and go to: http://localhost/phpmyadmin
- Click **New**, create a database named: `sac_system`
- Click the `sac_system` DB you just created.
- Go to the **Import** tab.
- Choose the `sac_system.sql` file and click **Go**.

4. ACCESS THE PROJECT
---------------------
In your browser, open:
http://localhost/sac-system2/

5. DEFAULT PAGES
----------------
- Registration:     http://localhost/sac-system2/register.php
- Login:            http://localhost/sac-system2/login.php
- Dashboard:        http://localhost/sac-system2/dashboard.php
- Home Page:        http://localhost/sac-system2/index.php

------------------------------------------
📩 NOTES
------------------------------------------
- Users register with their full name and email.
- A unique SAC (Security Access Code) is generated and emailed/stored.
- Use SAC to log in to the dashboard.
- Duplicate name/email registration is not allowed.

------------------------------------------
✅ CONTACT
------------------------------------------
Simeon Nzube Dominic
Simeondominic@gmail.com

