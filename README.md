
# Ghala System – Full-Stack PHP Web Application (Yii2 Advanced Template)

Welcome to the Ghala System, a full-featured PHP web application created for the Ghala Technical Intern Challenge – Core Systems Simulation. This system simulates real-world merchant interactions including order handling, payment setup, and customer transactions — all built using the Yii2 Advanced Template.

This guide is designed for developers or reviewers with no experience in Yii2, PHP frameworks, or this project. By the end of this document, you will be able to understand, install, run, and develop this system from scratch.

## Table of Contents

1. Project Summary
2. Technologies Used
3. Folder Structure
4. System Requirements
5. Installation Instructions
6. Database Setup
7. Application Configuration
8. Running the Application
9. System Roles and Access
10. Common Issues and Troubleshooting
11. Developer Notes
12. Suggested Improvements
13. Developer Information
14. License

## Project Summary

The Ghala System was developed to demonstrate a technical commerce simulation for interns. The key functionalities include:

- Merchant registration and authentication
- Order placement by customers
- Selection of payment methods (Mobile, Card, Bank)
- Admin control panel for system management
- Modular MVC structure using Yii2 Advanced Template

The system follows an organized structure by separating the frontend user interface, backend admin interface, and common/shared logic.

## Technologies Used

- PHP 8.x or higher
- Yii2 Advanced Template (Model-View-Controller Framework)
- Composer (Dependency management)
- MySQL or MariaDB (Database engine)
- XAMPP or WAMP (Web server environment)
- Bootstrap 5 (Frontend styling)
- Git (Version control)

## Folder Structure

```
ghala-system/
├── backend/         Admin panel (controllers, views, assets)
├── frontend/        Public merchant and user interface
├── common/          Shared models, configs, utilities
├── console/         CLI entry points and migration tools
├── environments/    Separate configs for dev and production
├── vendor/          Composer packages (auto-generated)
├── composer.json    Composer dependency definitions
├── yii              Console entry script
└── README.md        Project documentation
```

## System Requirements

Ensure your system has the following tools installed and configured:

- PHP 8.0 or later
- Composer
- MySQL or compatible database (5.7+)
- Git
- Web browser (Chrome, Firefox)
- Code editor (Visual Studio Code recommended)
- Apache via XAMPP or WAMP (recommended for local development)

## Installation Instructions

### Step 1: Clone the GitHub Repository

Open Command Prompt or Terminal and run the following:

```bash
cd C:/xampp/htdocs
git clone https://github.com/malilo7/ghala-system.git
cd ghala-system
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

Wait for the vendor directory and required packages to be installed.

### Step 3: Initialize the Yii2 Application

```bash
php init
```

Select the development environment by typing `0` and pressing Enter.

This command sets up the correct environment-specific configuration files.

## Database Setup

### Step 4: Create the MySQL Database

Log into phpMyAdmin or MySQL CLI and create a new database:

```sql
CREATE DATABASE ghala_simulation;
```

### Step 5: Import the SQL Data

If you have a SQL dump (e.g., `ghala_simulation.sql`), import it into the new database:

Via phpMyAdmin:
- Select the database `ghala_simulation`
- Click the "Import" tab
- Upload and run the SQL file

Or via command line:

```bash
mysql -u root -p ghala_simulation < path/to/ghala_simulation.sql
```

## Application Configuration

### Step 6: Configure Database Credentials

Open `common/config/main-local.php` and update the following block:

```php
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ghala_simulation',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
],
```

Ensure your database name, username, and password are correct for your local MySQL server.

## Running the Application

### Option 1: Using XAMPP

1. Start Apache and MySQL from XAMPP Control Panel
2. Open browser and navigate to:

```
http://localhost/ghala-system/frontend/web
```

### Option 2: PHP Built-in Server

```bash
php yii serve --port=8080
```

Then open:

```
http://localhost:8080
```

## System Roles and Access

This application supports different user roles. Depending on your configuration, roles may include:

- Administrator: Access backend to manage system users and data
- Merchant: Register, login, set up payment methods, and handle customer orders
- Customer (Optional): Place orders or submit queries (if implemented)

Manual user insertion may be needed unless registration functionality is enabled.

## Common Issues and Troubleshooting

| Issue | Solution |
|-------|----------|
| `composer` not found | Reinstall Composer and verify PATH |
| Missing `vendor/` | Run `composer install` again |
| SQL connection error | Update database credentials in config |
| 404 error on web | Make sure you're accessing `/frontend/web` |
| CSS or JS not loading | Clear `assets/` and `runtime/`, restart server |
| Application not starting | Check for missing environment configs or database issues |

## Developer Notes

- The Yii2 Advanced Template uses namespaces and autoloading via Composer
- `frontend/web` is the public entry point for users
- `backend/web` is the admin dashboard entry point (can be enabled)
- Do not commit `/vendor`, `/runtime`, or `main-local.php` files to GitHub
- Use migrations and seeders to manage your DB schema in production

## Suggested Improvements

- Add user email confirmation and password recovery
- Build out a REST API for mobile apps
- Deploy the app online with NGINX or Apache
- Use RBAC (Role-Based Access Control) for permissions
- Improve frontend UI with Vue.js or React
- Add logging, audit trail, and analytics

## Developer Information

- Author: Ally Daudi Malilo
- GitHub: https://github.com/malilo7
- Email: [malixally@gmail.com]
- Location: [Changanyikeni ubungo]
- Framework: Yii2 (Advanced Application Template)

## License

This project was built as part of the Ghala Technical Intern Challenge. It is intended for educational and professional evaluation purposes.

You may fork, modify, and use this project as a reference under a personal, academic, or open learning license.
