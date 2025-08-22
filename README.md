# Test Project For Software Developer(Expense Tracker with Monthly Report)

## Overview

A lightweight Expense Tracker that lets users record and manage daily expenses, with automatic monthly reports showing totals, breakdowns, and trends..


## Setup Instructions

1.  **Clone the repository:**
    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```

2.  **Install Composer dependencies:**
    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env` and configure your database:**
    ```bash
    cp .env.example .env
    # Edit the .env file with your database credentials
    ```

4.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations and seed:**
    ```bash
    php artisan migrate:fresh --seed
    ```
9.  **Serve the application:**
    ```bash
    http://localhost/(your project folder)
    ```
10.  **User Login Credentials:**
    Email: demo_user_one@gmail.com
    Password: 12345678
    Email: demo_user_two@gmail.com
    Password: 12345678


## Accessing the Application

- **Login**
  - Visit `/login` to sign in using your credentials
  - After login, you’ll be redirected to the **User Panel** where you can:
    - Create and manage daily expenses
    - View the current monthly report
    - Analyze expenses with a pie chart

- **Registration**
  - New users can visit `/register` to create an account
  - After registering and logging in, you’ll have access to:
    - Add daily expenses
    - Generate monthly reports
    - Visualize expenses with a pie chart
