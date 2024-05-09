# Job Portal App

## Local Environment Setup Instructions

### Prerequisites
- PHP installed on your local machine
- Composer installed on your local machine

### Installation Steps
1. Clone the repository to your local machine.
2. Open a terminal and navigate to the project folder.
3. Run the following command to install dependencies:
   composer install
   npm install
4. Configure your environment file:
   - Update the .env file with your local database configuration.

### Running the Application
1. Ensure PHP and Composer are properly set up on your local machine. If not, you can install PHP via XAMPP (https://www.apachefriends.org/index.html) which includes PHP and MySQL.
2. Check if PHP is installed by running the following command in your terminal:
   php -v
   If PHP is not recognized, add the PHP path to your system environment variables.
3. Compile assets by running:
   npm run dev
4. Migrate the database by running:
   php artisan migrate
5. Start the local server by running:
   php artisan serve
6. Once the server is running, access the project in your web browser at:
   http://localhost:8000

### Accessing the Database
- To access the local database, visit:
  http://localhost/phpmyadmin/
  Login with your database credentials.

## Troubleshooting
- If you encounter any issues with PHP or Composer, refer to the respective documentation for troubleshooting steps.
