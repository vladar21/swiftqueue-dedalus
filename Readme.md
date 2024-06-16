# Swiftqueue Dev Test

## Introduction
The Swiftqueue School of High Tech is looking for a better way to manage the courses they can provide to their students; they would like to create an online solution for managing these resources more efficiently.

## Technologies Used

- Backend: Native PHP 7.4
- Frontend: Tailwind CSS
- Database: SQLite
- Composer for dependency management
- PSR-2, PSR-4 coding standards

## Project Setup
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Set up your environment variables in a `.env` file (see `.env.example` for reference).
4. Create the database directory and file:
    ```sh
    touch database/database.sqlite
    ```
5. Run the SQL script in `src/migrations/schema.sql` to create the necessary tables:
    ```sh
    sqlite3 database/database.sqlite < src/migrations/schema.sql
    ```
6. Seed the database with initial data:
    ```sh
    php src/fixtures/users.php
    php src/fixtures/courses.php
    php src/fixtures/user_courses.php
    ```
## Directory Structure

  ```sh
   project-root/
   |-- public/
   |   |-- index.php             # Entry point for the application
   |
   |-- src/
   |   |-- Core/
   |   |   |-- Database.php      # Database connection management
   |   |   |-- Request.php       # Request handling
   |   |   |-- Response.php      # Response handling
   |   |   |-- Router.php        # Routing management
   |   |   |-- Auth.php          # Authentication handling
   |-- Controllers/
   |   |   |-- AuthController.php       # Controller for authentication
   |   |   |-- BaseController.php       # Base controller for shared functionality
   |   |   |-- UserCourseController.php # Controller for user-specific courses
   |-- Models/
   |   |   |-- Course.php        # Model for courses
   |   |   |-- UserCourse.php    # Model for user-specific courses
   |   |   |-- User.php          # Model for users
   |   |   |-- Model.php         # Base model for shared functionality
   |-- Policies/
   |   |   |-- AuthPolicy.php    # Policy for authentication
   |   |   |-- CoursePolicy.php  # Policy for courses
   |
   |-- views/
   |   |-- user_courses/
   |   |   |-- index.php         # View for listing user courses
   |   |   |-- create.php        # View for creating a new user course
   |   |   |-- edit.php          # View for editing a user course
   |   |-- user_courses/
   |   |   |-- index.php         # View for listing all courses for auth user
   |   |   |-- create.php        # View for creating a new course for auth user
   |   |   |-- edit.php          # View for editing a course for auth user
   |   |-- layouts/
   |   |   |-- main.php          # Main layout view
   |
   |-- database/
   |   |-- database.sqlite       # SQLite database file
   |
   |-- src/migrations/
   |   |-- schema.sql            # SQL script for database schema
   |
   |-- src/fixtures/
   |   |-- users.php             # Script for seeding users table
   |   |-- courses.php           # Script for seeding courses table
   |   |-- user_courses.php      # Script for seeding user_courses table
   |
   |-- .env                      # Environment variables
   |-- composer.json             # Composer configuration
  ```

## Usage
- Visit the `/login` URL to log in.
- Visit the `/logout` URL to logout
- Visit the `/user_courses` URL to see the list of courses (after logging in).
- Use the form on the `/users_courses/create` page to add a new course (student only).
- Use the edit and delete buttons on the courses list to manage courses (student only).

