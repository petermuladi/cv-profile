# 🚀CV Profile

#### The "CV-Profile" is a PHP web application that aims to provide a user interface for job seekers to create and publish their own online CV profiles after registration. The primary objective of the application is to assist job seekers during their job search by allowing them to share their online profile link with potential employers, and update their profiles or photos anytime they need. Additionally, the application provides a common platform that connects job seekers and employers, and allows job seekers to network and exchange experiences or information.

## Technologies

**Project is created with**
- 
- Bootstrap: v5.3.0
- PHP/8.1.10
- PHP GD
- PHP JSON
- Javascript
- Rest Api

## Features

The application allows users to upload a primary picture and secondary images through an admin interface. In addition to editing personal data, users can also add information about their schools and previous workplaces.

**Error Handling**
The application includes robust error handling to catch and display any errors that may occur during use.

## Installation

- Clone the repository

```bash
git clone https://github.com/petermuladi/cv-profile.git
```

- Set up a web server with PHP support (e.g. Apache, Nginx)
- Create a database and import the SQL schema from **schema.sql**
- Update **config.php** with your database credentials
- Start the web server and navigate to the project URL

## Usage

- The entry point for the application is **index.php**.
- The router is defined in **controllers/CoreController::Router()**.
- The database connection is managed by `DatabaseCon` class, and can be accessed with
  **src/DatabaseCon::Connect()** and **src/DatabaseCon::Disconnect()**.
- The **autoload.php** file loads classes as they are needed.
- The **View** class is used to render templates with data passed in as parameters.
- The **views/RestApiView** class provides methods for rendering responses in **JSON format**.

## Code Snippets

- **views/RestApiView.php**: A PHP class for rendering REST API responses in JSON format.
- **views/View.php**: A PHP class for rendering views in a given layout.
- **.htaccess**: An Apache configuration file for enabling URL rewriting and directing requests to a PHP script.
- **autoload.php**: A PHP script for automatically loading PHP classes based on their file names and locations.
- **index.php**: A PHP script for initializing the application and routing requests to the appropriate controller.
- **config.php**: A PHP script for defining configuration settings, such as database credentials.

## Development Environment

-	XAMPP web server package  3.3.0
-	Visual Studio Code 1.75
-	PHP 8.1
-	Apache/2.4.54 
-	Postman 10.12.0
-	OS:Windows 10
-	MySQL 15.1
-	phpMyAdmin 5.2.0
-	MariaDB 10.4.25

## Setting up Apache in XAMPP for Php router

### Apache httpd.config (My settings)

- Listen 3030
- <VirtualHost \*:3030>
  DocumentRoot "C:\XAMPP\htdocs\cv-profile"
  ServerName localhost:3030 </VirtualHost>

## Documentation
- **Find in** -> **uml-diagrams** folder -> **📊UML diagrams**
- Deployment 
- Package 
- UseCase
- Class

## Coding standards
- 🤟The **MVC-based** structure and the use of **Object Oriented** logic are expected.

#### ✅Great! It looks like everything is set up properly. If you run into any issues or have any questions, feel free to reach out to the project owner. Happy managing your CV profiles with 🚀CV Profile!

## Additional Notes
**The application was created by Muladi Péter.**
