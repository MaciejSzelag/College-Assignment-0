# 📝 College Assignments | Assignment 0

This repository contains the complete work for **Assignment 0**, including formal documentation and the full source code for all required tasks. A key component of this assignment is a **functional To-Do List application** built as a practical implementation of the course criteria.

I am documenting my progress through daily updates to maintain a clear version history and track the evolution of my solutions.

---

## 📂 Repository Structure

* **`Assignment 0 - report.docx`** — The formal written report and theoretical part of the assignment.
* **`/src`** — Core logic, reusable functions, and task implementations.
* **`/processes`** — Backend handlers for form submissions (Add/Edit/Delete).
* **`/config`** — Database connection settings and configuration.
* **`/includes`** — Reusable HTML components (froms/edit,add; to do list).

---

## 🛠️ To-Do Application Setup

As part of the practical tasks, a To-Do application was developed. Follow these steps to set up the environment:

### ⚙️ Technologies Used
* **Backend:** PHP 8.2 (Procedural Logic) -> next step (Object-Oriented)
* **Database:** MySQL (Relational storage)
* **Frontend:** HTML5, JavaScript (ES6+)
* **Styling:** CSS3, SCSS/Sass (Modular styling)

### 1. Database Configuration
Create a database named `todo_db` in **phpMyAdmin** and execute the following SQL to create the required table structure:

```sql
CREATE TABLE `tasks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;