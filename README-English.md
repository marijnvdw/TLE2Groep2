# Open Hiring Technical Transfer Document

Changelog 22/1
Added:

- Improved text readability
- Enhanced PHPmailer setup instructions
- Improved initial setup instructions
  - Instructions for creating the .env file and key generation
- Adjusted navbar for desktop
- Modified back buttons to prevent them from appearing within content

## Introduction

Welcome to the "Open Hiring" project.
This documentation contains the technical transfer for the project.
It outlines where to find various components within the project and how the database functions.

### Setup
This project uses Laravel and relies on Breeze and Composer.

Follow these steps to install Composer on your operating system:
[Composer Documentatie](https://getcomposer.org/doc/00-intro.md)

un the following command in your IDE terminal to install Composer:
```bash
composer install
```

Execute this command to install Breeze:
```bash
composer require laravel/breeze --dev
```

The following commands must be executed in the IDE to create a .env file, which is used for configuration:
``cp .env.example .env``
``php artisan key:generate``

Run the following command to generate the databases:
``php artisan migrate``

Update the DB configurations in the .env file with the correct database details, and set 'DB_CONNECTION' to 'sqlite'.

Add or adjust the following settings in the .env file to ensure mail functionality:
```bash
MAIL_MAILER=log
#MAIL_HOST=127.0.0.1
#MAIL_PORT=2525
#MAIL_USERNAME=null
#MAIL_PASSWORD=null
#MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

MAIL_USERNAME= ---
MAIL_PASSWORD= ---
MAIL_HOST= ---
MAIL_PORT= ---
MAIL_ENCRYPTION=tls
```

### Mail System Setup
This project also uses the Composer library "phpmailer" to send emails.
It can be installed using this command:
```bash
composer require phpmailer/phpmailer
```

### Local Development
To test the website locally, use the following commands. These should be executed in the terminal of your IDE:
```bash
npm run dev
```
And this should be executed in a separate terminal in the IDE:
```bash
php artisan serve
```
You now have a working project in your local environment.

## Project Structure

De project repository is als volgt gestructureerd:

The project repository is structured as follows:

- /app: Contains the core logic of the Laravel application, such as controllers, models, and services.
- /bootstrap: Startup files for setting up the application.
- /config: Configuration files for the application.
- /database: Migration and seeding files for managing the database.
- /public: Contains the index.php and other public files (e.g., images, CSS, JavaScript).
- /resources: Views, categorized into subgroups like admin, emails, and application.
  - css: Stylesheets for the application.
  - js: JavaScript files for front-end functionality.
  - views: Blade views (Laravel's templating engine). This folder is further subdivided:
    - admin: Views specific to admin pages
    - application: Views specific to the application process
    - auth: Contains views for authentication, such as login and registration
    - companies: Views related to companies (e.g., company profiles)
    - components: Small, reusable components like modals or forms
    - emails: Contains views for emails sent to users
    - layouts: Master layouts used by other views
    - profile: Views related to user profiles <br><br>
    - about-us.blade.php: Page with information about the company or team
    - companies.blade.php: Page with an overview of companies
    - dashboard.blade.php: User overview dashboard
    - error.blade.php: Error page for when something goes wrong
    - home.blade.php: Application homepage
    - vacature-overzicht.blade.php: Page with an overview of job listings
  - /routes: Contains route files (e.g., web.php for web routes).
  - /storage: Files such as photos are stored here.
  - /tests: Contains unit and integration tests.
  - /vendor: Contains dependencies installed via Composer. <br>
  - .env: This file contains the project configurations. It must be created manually and is not included for security reasons.
  - composer.json: Contains the project dependencies and metadata.
  - package.json: For front-end dependencies and scripts.

## Database Explanation

The database is designed to support the core functionalities of the application. Below is an overview of the tables and their purposes:

### Users:
- Describes managers and admins of the application.
- Fields:
  - id: Unique ID of the user
  - name: User's name
  - email: User's email address (unique)
  - email_verified_at: Date and time of email verification
  - password: Hashed password
  - remember_token: Session token
  - created_at: Creation date
  - updated_at: Last modification date
  - company_id: ID of the company the user belongs to
  - admin: Boolean (0/1), 1 for admin rights

### Companies:
- Contains information about companies posting job listings.
- Fields:
  - id: Unique ID of the company
  - name: Name of the company
  - phone_number: Company's phone number
  - address: Company's address
  - city: City where the company is located
  - company_code: Unique code to register with a company
  - created_at: Creation date
  - updated_at: Last modification date
  - image: Company image

### Applications:
- Tracks job listings posted by companies.
- Fields:
  - id: Unique ID of the job listings
  - creation_date: Creation date
  - title: Job title (role within the company)
  - description: Job description (longer text visible on the job listing overview)
  - employment: Boolean (0/1), 1 for full-time, 0 for part-time
  - drivers_licence: Boolean (0/1) for driver's license requirement, 1 for mandatory
  - adult: Boolean (0/1) for adulthood, 1 for mandatory
  - image: Job image
  - details: Short job description (shorter text for the index page)
  - company_id: ID of the company posting the job
  - created_at: Creation date
  - updated_at: Last modification date
  - sector: Sector of the job listing

### Applicants:
- Contains information about job applicants.
- Fields:
  - id: Unique ID of the applicant
  - email: Applicant's email address
  - status: Application status (e.g., accepted, rejected)
  - application_id: ID of the job listing applied for (foreign key)
  - created_at: Creation date
  - updated_at: Last modification date

### Relationships:
- Users and Companies: A manager can be associated with a company.
- Companies and Applications: A company can post multiple job listings.
- Applications and Applicants: A job listing can have multiple applicants.

### Database Diagram:
![img.png](Database-Img.png)

# Keeping the Server Up-to-Date:

If adjustments need to be made to the website, follow these instructions to deploy a new version to the server:

1. Ensure the updated code is in the Main branch of the GitHub repository.
2. Open Terminal/Powershell to establish a connection:
```bash
ssh <inlognaam>@<IP-adres>
```
3. Enter your password.
4. Navigate to the project directory:
```bash
cd www/open-hiring
```
5. Make sure you're in the /var/www/open-hiring directory, not a subdirectory like www/open-hiring. 5. Run the script to deploy new versions to the server:
```bash
./deploy.sh
```
6. Specify the correct directory:
```bash
open-hiring
```
7. If a new version is available, it will be installed on the server.









