# StudentManagementSystem
## Installation
- Run git clone https://github.com/yasirmusthafapp/StudentManagementSystem.git StudentManagementSystem
- cd StudentManagementSystem
- Run composer install (install composer beforehand)
- From the projects root run cp .env.example .env
- Configure your .env file according to your need in ".env" file and create Database
- php artisan key:generate
- php artisan migrate
- Start development server
  ```
  $ php artisan serve
  ```