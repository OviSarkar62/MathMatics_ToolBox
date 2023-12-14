<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# MathMatics ToolBox

The MathMatics ToolBox Application is a collection of mathematical tools designed to help users to keep all the necessary math tools in one place. It provides a user-friendly interface for calculating daily life's math-related problems. It is designed to be user-friendly, efficient, and extensible for various applications in mathematics.

## Contents

- [Project View](#Project View)
- [Stack](#stack)
- [Installation](#installation) 
- [Usage](#usage) 

## Project View

<h4>For User Profile<h4/>

- **Register**
<p align="center">
  <img alt="img-name" src="public/assets/img/reg ss1.png" width="700">
</p>
  
- **Login**
<p align="center">
  <img alt="img-name" src="public/assets/img/login ss1.png" width="700">
</p>

## Stack

- MySQL - MySQL database for storing data.
- Laravel - Backend framework for building CRUD Operations.
- PHP - Scripting language.

## Installation

To set up Todo locally, follow these steps:

- Clone the repository:

      git clone https://github.com/OviSarkar62/MathMatics_ToolBox.git
      
- Navigate to the project directory:

      cd MathMatics_ToolBox

- In the .env file in the root directory set the following environment variables:

      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=<Database Name>
      DB_USERNAME=<root>
      DB_PASSWORD=<Pass>

- Migrate

      php artisan migrate
  
- Start the server: 

      php artisan serve
  
- Access the application. Open your web browser and visit http://localhost:8000 to access the MathMatics ToolBox application.

## Usage

- Arithmetic Operations: Click the "calculate" button to calculate an arithmetic operation.

- Calculators: Almost nine types of calculators are used for calculating daily math stuff.

- Converters: Almost sixteen types of converters are used for the conversion of daily math stuff.
