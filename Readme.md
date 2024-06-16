# Swiftqueue Dev Test

## Introduction
The Swiftqueue School of High Tech is looking for a better way to manage the courses they can provide to their students; they would like to create an online solution for managing these resources more efficiently.

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
    ```
## Directory Structure
- `src/` - Contains the source code (models, controllers, core classes for routing, request handling, database connection, and authentication).
- `public/` - Contains the public files (index.php, assets).
- `config/` - Contains configuration files.
- `views/` - Contains the view templates.

  ```sh
  swiftqueue-dev-test/
  ├── public/
  │   ├── index.php               # Entry point of the application, initializes the app
  │   ├── assets/                 # Directory for static assets
  │       ├── js/
  │           ├── app.js          # Custom JavaScript file
  │       ├── css/
  │           ├── styles.css      # Custom CSS file
  ├── src/
  │   ├── Controllers/
  │       ├── CourseController.php # Controller for handling course-related requests
  │       ├── AuthController.php   # Controller for handling authentication requests
  │   ├── Models/
  │       ├── Course.php          # Model representing the Course entity
  │       ├── User.php            # Model representing the User entity
  │   ├── Core/
  │       ├── Router.php          # Handles routing of the application
  │       ├── Request.php         # Handles HTTP request data
  │       ├── Response.php        # Handles HTTP response data
  │       ├── Database.php        # Manages the connection to the database
  │       ├── Auth.php            # Handles user authentication
  │       ├── Config.php          # Handles application configuration
  │       ├── View.php            # Handles rendering of views
  │   ├── Policies/
  │       ├── AuthPolicy.php      # Authorization checks for authentication
  │       ├── CoursePolicy.php    # Authorization checks for course actions
  │   ├── routes.php              # Defines the application routes and their middlewares
  ├── config/
  │   ├── config.php              # General configuration file (not used with .env in this case)
  ├── migrations/             # Directory for database migration scripts
  │   ├── schema.sql          # SQL script to initialize the database schema
  ├── fixtures/               # Directory for fixtures
  │   ├── users.php           # Fixture script to populate users table
  │   ├── courses.php         # Fixture script to populate courses table
  ├── views/
  │   ├── layouts/
  │       ├── main.php            # Main layout for the application
  │   ├── courses/
  │       ├── index.php           # View for listing courses
  │       ├── create.php          # View for creating a new course
  │       ├── edit.php            # View for editing an existing course
  │   ├── auth/
  │       ├── login.php           # View for user login
  ├── database/
  │   ├── database.sqlite         # SQLite database file (created manually)
  ├── .env                        # Environment variables configuration
  ├── .env.example                # Example environment variables configuration
  ├── composer.json               # Composer dependencies and autoload configuration
  ├── README.md                   # Project documentation and setup instructions
  ```

## Usage
- Visit the `/login` URL to log in.
- Visit the `/courses` URL to see the list of courses (after logging in).
- Use the form on the `/courses/create` page to add a new course (admin only).
- Use the edit and delete buttons on the courses list to manage courses (admin only).

## Documentation
- Documentation is generated automatically from the docstrings in the source code.
- Run `phpDocumentor` to generate the documentation.

## SOLID Principles and Polymorphism
- The `Course` and `User` models follow the Single Responsibility Principle by handling only the data-related operations.
- The `CourseController` and `AuthController` use Dependency Injection to follow the Dependency Inversion Principle.
- Polymorphism is applied in the controllers by using the same method names (`create`, `edit`, `delete`, `login`, `logout`) to handle different HTTP methods and operations.
- Authorization checks are handled by request policies to adhere to the Open/Closed Principle.
