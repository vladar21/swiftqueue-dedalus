# Swiftqueue Dev Test

## Introduction
The Swiftqueue School of High Tech is looking for a better way to manage the courses they can provide to their students; they would like to create an online solution for managing these resources more efficiently.

## Project Setup
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Set up your environment variables in a `.env` file (see `.env.example` for reference).
4. Create the database and update the `.env` file with your database credentials.
5. Run the SQL script in `config/schema.sql` to create the necessary tables.

## Directory Structure
- `src/` - Contains the source code (models, controllers, core classes for routing, request handling, database connection, and authentication).
- `public/` - Contains the public files (index.php, assets).
- `config/` - Contains configuration files.
- `views/` - Contains the view templates.

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
