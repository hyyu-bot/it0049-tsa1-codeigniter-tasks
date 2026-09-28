# IT0049 - TSA1: Tasks for Today Management System

**Student:** Hayden Bert Y. Yu  
**Section:** AC31  
**Professor:** Ms. Canlas  
**Course:** IT0049 - Web System Technologies  

---

## Overview

A Tasks for Today Management System built with **CodeIgniter 4** that allows team members to track and manage daily to-do items. The system features a filtered dashboard showing only today's tasks, a complete task listing, a user profile page, and an about page.

---

## Features

- **Welcome Page (/)** - Dashboard showing only tasks scheduled for today
- **Task List Page (/tasks)** - Complete listing of all tasks ordered by date
- **Profile Page (/profile)** - Displays the demo user's information
- **About Page (/about)** - Identifies the developer and system information

---

## Technology Stack

- **Framework:** CodeIgniter 4.5
- **Language:** PHP 8.2
- **Database:** MySQL with Model + Query Builder
- **Pattern:** MVC (Model-View-Controller)

---

## Database Schema

### tasks table
| Column | Type | Description |
|--------|------|-------------|
| id | INT AUTO_INCREMENT | Primary key |
| title | VARCHAR(150) | Task title |
| status | VARCHAR(20) | 'pending' or 'completed' |
| task_date | DATE | Due date for the task |
| created_at | DATETIME | Record creation timestamp |

### users table
| Column | Type | Description |
|--------|------|-------------|
| id | INT AUTO_INCREMENT | Primary key |
| username | VARCHAR(50) | Unique username |
| full_name | VARCHAR(100) | Full name |
| email | VARCHAR(100) | Email address |
| created_at | DATETIME | Record creation timestamp |

---

## Setup Instructions

### Prerequisites
- PHP 8.1 or higher
- MySQL/MariaDB
- Composer (optional, for installing CodeIgniter)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/haydenyu06/it0049-tsa1-codeigniter-tasks.git
   cd it0049-tsa1-codeigniter-tasks
   ```

2. **Configure the environment**
   Edit `.env` file and update the database settings:
   ```env
   app.baseURL = 'http://localhost/my-ci4-app/'
   database.default.hostname = localhost
   database.default.database = tsa1_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

3. **Create the database**
   ```bash
   mysql -u root -p
   CREATE DATABASE tsa1_db;
   EXIT;
   ```

4. **Import the database schema**
   ```bash
   mysql -u root -p tsa1_db < tsa1_db.sql
   ```

5. **Run the application**
   ```bash
   # Option 1: Using PHP built-in server
   php spark serve

   # Option 2: Using XAMPP
   # Copy the project to xampp/htdocs/my-ci4-app
   # Start Apache and MySQL in XAMPP control panel
   # Visit http://localhost/my-ci4-app/
   ```

---

## Routes

| URL | Page | Description |
|-----|------|-------------|
| `/` | Welcome | Shows only today's tasks |
| `/tasks` | Task List | Shows all tasks ordered by date |
| `/profile` | Profile | Shows demo user information |
| `/about` | About | Developer and system information |

---

## Sample Data

### Tasks (10 records)
- 2 tasks completed on Sep 25, 2026
- 1 task completed on Sep 26, 2026
- 2 tasks pending on Sep 27, 2026
- 3 tasks pending on Sep 28, 2026 (today)
- 1 task pending on Sep 29, 2026
- 1 task pending on Sep 30, 2026

### Users (1 record)
- Username: `haydenyu`
- Full Name: Hayden Bert Y. Yu
- Email: haydenyu@student.edu

---

## Submission

- **GitHub Repository:** https://github.com/haydenyu06/it0049-tsa1-codeigniter-tasks
- **Hosted Version:** https://haydenyu.42web.io/

---

## File Structure

```
my-ci4-app/
├── app/
│   ├── Config/
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── Welcome.php
│   │   ├── Tasks.php
│   │   ├── Profile.php
│   │   └── Pages.php
│   ├── Models/
│   │   ├── TaskModel.php
│   │   └── UserDemoModel.php
│   └── Views/
│       ├── welcome/index.php
│       ├── tasks/index.php
│       ├── profile/index.php
│       └── about.php
├── public/
│   ├── index.php
│   └── .htaccess
├── .env
├── tsa1_db.sql
└── README.md
```
