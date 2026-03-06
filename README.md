# MIMS AKURE - School Management System

MIMS (MSSN Islamic Model Schools Akure) is a comprehensive PHP-based platform designed to manage and streamline various administrative and academic processes within an educational institution.

## 🚀 Key Features

- **Student Information Management:** Efficiently manage student records, admissions, and personal details.
- **Teacher & Staff Management:** Handle staff profiles, assignments, and records.
- **Class & Subject Organization:** Structure academic classes, subjects, and syllabi.
- **Attendance Tracking:** Monitor and record daily attendance for students and staff.
- **Grade Management:** Process results, examinations, and performance tracking.
- **Timetable Scheduling:** Organize school timetables and events.
- **Reporting & Analytics:** Generate comprehensive insights for school administrators.

## 🛠️ Technology Stack

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML5, Vanilla CSS, JavaScript, Bootstrap 5, jQuery
- **Server Environment:** Designed to run on Apache (XAMPP/WAMP/LAMP)

## 📂 Project Structure

- `/admin` - Administrator dashboard and core management logic
- `/students` - Student portal for viewing results, timetable, and profiles
- `/teachers` - Teacher portal for managing grades, attendance, and classes
- `/public` - Public-facing website (Home, About, Contact, Login, Signup)
- `/config` - Database configuration (`db.php`) and environment settings
- `/results` - Modules handling grading and result computations
- `/assets` - CSS, JS, images, and vendor libraries (Bootstrap, jQuery, etc.)

## ⚙️ Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/bamiebot-maker/mimsakure.git
   ```
2. **Setup Server:**
   - Move the project folder to your local server directory, e.g., `htdocs` for XAMPP or `www` for WAMP.
3. **Database Configuration:**
   - Create a new MySQL database named `mims_db`.
   - Import the provided `.sql` file (if available) into your database.
   - Update `config/db.php` with your database credentials if necessary:
     ```php
     $host = "localhost";
     $username = "root";
     $password = "";
     $dbname = "mims_db";
     ```
4. **Access the Application:**
   - Open your web browser and navigate to `http://localhost/Mssnschool`

## 🤝 Contribution & Flaw Review

This system is currently undergoing a comprehensive review to identify and resolve existing flaws (UI, UX, Logic, Security). Contributions to fix these issues are welcome!

---
*Developed for MSSN Islamic Model Schools Akure.*
