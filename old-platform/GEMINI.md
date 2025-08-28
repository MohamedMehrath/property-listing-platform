# Project Overview

This project is a web-based property management system, likely for real estate. It allows users to list, search, and manage property listings. The application is written in PHP, using a procedural style and the deprecated `mysql` extension for database interaction. The frontend is built with HTML, CSS, and some JavaScript.

## Key Technologies

*   **Backend:** PHP (procedural, using deprecated `mysql` extension)
*   **Frontend:** HTML, CSS, JavaScript
*   **Database:** MySQL

## Architecture

The application follows a simple structure:

*   **`index.php`:** The main entry point of the application.
*   **`Connections/`:** Contains the database connection files.
*   **`css/`:** Contains the stylesheets.
*   **`js/`:** Contains the JavaScript files.
*   **`images/`:** Contains the images used in the application.
*   **`.php` files:** The core logic of the application is spread across numerous PHP files, each responsible for a specific task (e.g., `insert.php`, `update.php`, `delete_item_admin.php`).
*   **`.sql` files:** The database schema is defined in `.sql` files.

# Building and Running

This project does not have a build process. To run the project, you need a web server with PHP and a MySQL database.

1.  **Setup a web server:** Install a web server like Apache or Nginx with PHP.
2.  **Setup a MySQL database:** Install a MySQL server.
3.  **Import the database:** Create a database named `aqarmarket` and import the schema from `aqarmarket.sql` or `aqarmarket_Database.sql`.
4.  **Configure the database connection:** Update the database connection details in `Connections/goodnews.php` if they are different from the default (localhost, root, no password).
5.  **Place the project files in the web server's root directory:** Copy the project files to the web server's root directory (e.g., `/var/www/html` or `htdocs`).
6.  **Access the application:** Open a web browser and navigate to the web server's address (e.g., `http://localhost`).

# Development Conventions

*   **Coding Style:** The code is written in a procedural style. There are no strict coding style guidelines enforced.
*   **Database Interaction:** The code uses the deprecated `mysql` extension for database interaction. It is recommended to update the code to use `mysqli` or `PDO` for security and compatibility reasons.
*   **Testing:** There are no tests in the project.
*   **Contributing:** There are no contribution guidelines.
