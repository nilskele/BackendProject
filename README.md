
# Steps to Run the Laravel Project Locally (Using XAMPP and SQLite)
---
## 1. Prerequisites
Before you begin, ensure that the following tools are installed:

- PHP (installed via XAMPP, make sure you're using PHP 8.x or above)
- Composer (for managing PHP dependencies)
- XAMPP (to manage Apache, PHP, and SQLite)
- Download XAMPP
- SQLite (already included in XAMPP)

## 2. Clone the Repository
Start by cloning the project repository to your local machine:

```bash
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

## 3. Install PHP Dependencies
Once you've cloned the project, you need to install the PHP dependencies using Composer. Run the following command:
```bash
composer install
```
This will download and install all the PHP packages required for your project as defined in composer.json.

## 4. Set Up Environment Variables
Next, you need to set up your environment variables. Copy the .env.example file to a new .env file:
```bash
cp .env.example .env
```
Open the .env file and configure your SQLite database settings. Since you're using SQLite with XAMPP, you’ll configure it like so: 
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/Applications/XAMPP/xamppfiles/htdocs/your-laravel-project/database/database.sqlite
```
Make sure that the DB_DATABASE path points to where the SQLite database file is located. You can also create the database.sqlite file manually inside the database/ directory if it doesn't exist yet.

## 5. Mailtrap Integration for Sending Emails
To send emails locally using Mailtrap:

Sign up at Mailtrap.io and create a new inbox.
Copy the SMTP credentials provided by Mailtrap.
Update your .env file with the following Mailtrap credentials:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
## 6. Generate the Application Key
Laravel requires an application key for encryption. To generate the key, run:
```bash
php artisan key:generate
```
This will generate a new key and update your .env file automatically.

## 7. Set Up the SQLite Database
Now, let's create the SQLite database.
Go to the database/ directory in your project folder.
Create a new SQLite database file:
```bash
touch database.sqlite
```
This will create an empty SQLite database file that Laravel will use.

## 8. Run Migrations (Optional)
If your project includes database migrations, you need to run them to set up your database schema. Run the following command:
```bash
php artisan migrate
```
This will create the necessary tables in your SQLite database.

## 9. Install JavaScript Dependencies
If your project uses front-end assets (e.g., Vue.js, React, etc.), you need to install the JavaScript dependencies using npm:
```bash
npm install
```
This will install the JavaScript packages required for your front-end code.

## 10. Compile the Assets
If your project uses Laravel Mix or other asset bundlers, you need to compile your assets. Run:
```bash
npm run dev
```
This will compile your assets (CSS, JS, etc.) for local development.

## 11. Start XAMPP and Serve the Application
Open XAMPP and start the following services:

Apache (for serving the app)
To run the Laravel application locally, you don't need a database server since you're using SQLite. Run the following command:
```bash
php artisan serve
```
By default, the application will be available at http://127.0.0.1:8000 in your browser.

## 12. Access the Application
Once the server is running, you can access your application at:
```bash
http://127.0.0.1:8000
```

---
# Sources 
--- 

https://chatgpt.com/share/6783e882-7490-800a-a04a-d1235c102d3c
https://chatgpt.com/share/6783e895-0404-800a-9140-a42a62e3766f
https://chatgpt.com/share/6783e8aa-d400-800a-b27a-9d9daef513d2
https://chatgpt.com/share/678112b4-f598-800a-987f-306b8136b5f9
https://chatgpt.com/share/6781121d-ca48-800a-91d0-73979dc85583
https://chatgpt.com/share/6781121d-ca48-800a-91d0-73979dc85583
https://inspector.dev/laravel-auth-routes-tutorial/
https://stackoverflow.com/questions/39196968/laravel-5-3-new-authroutes
https://stackoverflow.com/questions/51062030/updating-user-data-in-default-laravel-application
https://stackoverflow.com/questions/54396408/how-to-make-user-admin-in-laravel

---
# Functionalities
--- 

Thank you for clarifying! Here’s the updated version of the text with the correction:

Some seeders already include images as examples (e.g., profile pages and liquidations), while others, like newsletters, do not display images by default. However, if you create a new newsletter, the image will be shown. For functionalities like liquidations and profiles, images are provided as examples in the seeders, but new or updated records will not display their images, even though the new image value is correctly stored in the database.

This approach was chosen to enhance the visual aspect of the project by providing example images for most functionalities. It’s important to note that this does not affect the functionalities, everything works as intended.
Once the server is running, you can access your application at:
```bash
http://127.0.0.1:8000
```
You should now be able to see the project running locally!
