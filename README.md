VELOCITI - Smart Parking Management System

> A modern digital system to manage parking entries, monitor real-time data, and generate reports for better control and efficiency.

About VELOCITI

**VELOCITI** is a digital parking management system built with **Laravel**, designed to assist **parking attendants (Petugas)** and **administrators (Admin)** in handling daily parking operations **quickly, accurately**, and **transparently**.

Whether you're logging vehicle entries, tracking real-time parking slot availability, or analyzing financial reports — **VELOCITI** makes it smooth and intuitive.

Features

- 🚘 **Vehicle Entry/Exit Recording**
- 📈 **Real-Time Slot Monitoring**
- 💰 **Automatic Parking Fee Calculation**
- 🧾 **Digital Receipt with QR Code**
- 🛂 **Multi-Role Authentication (Admin & Petugas)**
- 📊 **Daily / Weekly / Monthly Transaction Reports**
- 🎨 **Responsive UI with Bootstrap + Tailwind + AOS Animation**

Tech Stack

| Tool         | Description                    |
|--------------|--------------------------------|
| Laravel 10   | PHP Web Framework              |
| Blade        | Laravel Templating Engine      |
| Tailwind CSS | Utility-first CSS framework    |
| Bootstrap 5  | Layout & Components            |
| AOS.js       | Scroll-based Animation Library |
| Chart.js     | Optional Graph Integration     |
| MySQL        | Relational Database            |

Laravel Features Used

- 🛡️ **Multi-Role Auth** using Laravel Guard
- 📥 **Form Validation** with `Request` class
- 🗂️ **Route Grouping** & Named Routing
- 🧾 **Eloquent ORM** for database interaction
- 🧠 **Blade Components** & Conditional Rendering

 Installation Guide

```bash
1. Clone the repository
git clone https://github.com/yourusername/velociti-parking.git

2. Install PHP dependencies
composer install

3. Install front-end dependencies
npm install && npm run dev

4. Setup environment
cp .env.example .env
# Update your DB credentials inside .env:
# DB_DATABASE=velociti
# DB_USERNAME=root
# DB_PASSWORD=

5. Run migrations and seed data
php artisan migrate --seed

6. Start the development server
php artisan serve
