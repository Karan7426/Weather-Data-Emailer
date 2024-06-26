# Weather-Data-Emailer

## Description

This project is a weather report application built using CodeIgniter 4. It allows users to register, log in, check the current weather, and view their weather report history. The application includes the following features:

1. User Registration and Login**: Users can register and log in to access the application.
2. Weather Report: Users can get current weather details including temperature, weather icon, description, humidity, and pressure.
3. 7-Day Forecast: Provides a forecast for the next 7 days, including maximum and minimum temperatures.
4. Email Notification: Sends the weather summary to the user's email address after registration.
5. View History : Users can view the history of their weather reports.
6. Responsive Design: The application is designed to work seamlessly on desktop and mobile devices.


## Technologies Used

- Frontend: HTML5, CSS3 (Bootstrap, Font Awesome),JavaScript (jQuery)
- Backend: PHP (CodeIgniter)
- APIs: Weather API (to fetch weather data)
- Database: Mysql


## Requirements

- PHP version 7.4 or higher
- XAMPP local server environment with PHP and MySQL
- Composer (for managing dependencies)


## Setup Instructions


### Step-by-Step Setup

1. **Clone the repository**:
    ```sh
    git clone https://github.com/Karan7426/Weather-Data-Emailer
    cd weather_data_emailer
    ```

2. **Install dependencies**:
    ```sh
    composer install
    ```

3. **Set up your database**:
    - Start XAMPP and ensure Apache and MySQL are running.
    - Open `phpMyAdmin` (http://localhost/phpmyadmin).
    - Create a new database, e.g.`weather_task_db`.

4. **Configure the application**:
    - Open the `app/Config/Database.php` file and connect with database:
        ```php
        public array $default = [
            'DSN'          => '',
            'hostname'     => 'localhost',
            'username'     => 'root',
            'password'     => '',
            'database'     => 'weather_db',
            'DBDriver'     => 'MySQLi',  
             
        ];
        ```

5. ## Database Schema for database name weather_db

The database schema for the `users` and `weather_data` tables is as follows:

### `users` Table

```sql
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `mobile_number` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_on` DATETIME NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1
);

CREATE TABLE `weather_data` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `location` VARCHAR(100) NOT NULL,
    `date` DATE NOT NULL,
    `temperature` DECIMAL(5, 2) NOT NULL,
    `humidity` DECIMAL(5, 2) NOT NULL,
    `weather_description` TEXT NOT NULL,
    `pressure` DECIMAL(5, 2) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

 

6. Copy the project directory to your XAMPP `htdocs` directory.


## Running the Application

1. Start XAMPP and ensure Apache and MySQL are running.
2. Open your browser and go to http://localhost/weather_data_emailer/.
3. You can register a new user or log in with existing credentials.
4. After logging in, you will be able to check the weather and view your weather report history.

## Additional Information

- **Logout and User Profile**: After logging in, the user's profile name and a logout option are displayed on the right side of the navigation bar.
- **Navigation Sidebar**: After logging in, a sidebar with options to "Check Weather" and "History" is displayed. The ""Check Weather" option is selected by default.

## Dependencies

-All project dependencies are listed in the `composer.json` file.

## Contributions

-Contributions are welcome. Please submit a pull request or open an issue for any changes or suggestions.

