# Learning Manager System (LMS)

![LMS Logo](public/frontend/img/logo.svg)

## Introduction

Welcome to the Learning Manager System (LMS). This application is designed to manage and track the learning progress of students, courses, and instructors within. It provides a user-friendly interface for administrators, instructors, and students to interact with the system efficiently.

## Features

- **User Management:** Admins can manage users including students, instructors, and other admins.
- **Course Management:** Create, update, and delete courses. Assign instructors to courses.
- **Student Enrollment:** Enroll students in courses and track their progress.
- **Assignments & Quizzes:** Create and manage assignments and quizzes for courses.
- **Notifications:** Email notifications for important events such as bill, warning, etc.
- **Payments:** 100% online payment

## Installation

To install and run this application on your local machine, follow the steps below:

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js & npm
- MySQL or any other supported database

### Steps

1. **Clone the repository**

    ```bash
    git clone https://github.com/minh261002/Learning-Manager-System
    cd Learning-Manager-System
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Setup environment variables**

    Copy the `.env.example` file to `.env` and configure your database and other environment settings.

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other necessary configurations.

4. **Generate application key**

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations and seed the database**

    ```bash
    php artisan migrate --seed
    ```

6. **Build front-end assets**

    ```bash
    npm run dev
    ```

7. **Serve the application**

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Usage

### Admin

- Log in as an admin to manage users, courses, and view reports.
- Admin dashboard provides an overview of the system status.

### Instructor

- Log in as an instructor to manage assigned courses, create assignments, and grade students.
- View the list of students enrolled in your courses.

### Student
- Log in as a student to view enrolled courses, submit assignments, and check grades.
- Access course materials and participate in quizzes.

## Contributing
If you want to contribute to the project, please create a pull request and describe your proposed change in detail.

## Problems
If you encounter any problems while using the app, please create an issue on Github and describe the problem in detail.

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact
If you have any questions or need further assistance, feel free to contact us at trcongminh.261002@gmail.com.

Thank you for using Learning Manager System!
