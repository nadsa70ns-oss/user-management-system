# user-management-system
A simple PHP + MySQL web app with a form to save user records and a real-time toggle button to update status — no page refresh needed.

# User Records Management System

A simple web page that connects to a MySQL database to store and manage user records (name, age, and status) with real-time updates — no page refresh needed.

## Features
- Submit a form with name and age, saved into a MySQL database.
- Display all records in a table below the form.
- Toggle each record's status between 0 and 1 with one click.
- All actions happen instantly via JavaScript (AJAX) — no page reload.

## Tech Stack
HTML, CSS, JavaScript, PHP, MySQL

## Files
- index.html — form + table + JavaScript logic
- config.php — database connection settings
- save.php — inserts a new record
- list.php — returns all records as JSON
- toggle.php — flips a record's status (0/1)

## Database Setup
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) DEFAULT 0
);

## Setup Instructions
1. Create the user table.
2. Update credentials in config.php.
3. Upload all files to the same folder on your hosting.
4. Open index.html through your live domain.

## How It Works
1. Submit — form data is sent to save.php via fetch(), which inserts a new row.
2. Display — list.php returns all rows as JSON, rendered into the table.
3. Toggle — clicking "Toggle" calls toggle.php, which flips the status in the database and updates the page instantly.
<img width="1366" height="768" alt="database" src="https://github.com/user-attachments/assets/7e930a6b-4a69-4637-9bbe-6ed1a6a3ac82" />
2. Display — list.php returns all rows as JSON, rendered into the table.
3. Toggle — clicking "Toggle" calls toggle.php, which flips the status in the database and updates the page instantly.
