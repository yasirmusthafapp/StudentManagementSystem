# StudentManagementSystem
Installation
Run git clone https://github.com/yasirmusthafapp/StudentManagementSystem.git StudentManagementSystem
cd StudentManagementSystem
Run composer install (install composer beforehand)
From the projects root run cp .env.example .env
Configure your .env file, with:
php artisan key:generate
php artisan migrate
