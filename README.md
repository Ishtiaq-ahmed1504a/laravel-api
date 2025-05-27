Laravel API - Task Manager Backend
This is the backend API built with Laravel 12.15.0 for managing tasks in a full-stack application.
Features
- RESTful API for tasks
- CRUD operations
- Unit tests for API endpoints

Setup
1. git clone https://github.com/ishtiaq-ahmed1504a/laravel-api.git
2. cd laravel-api
3. cp .env.example .env
4. composer install
5. php artisan key:generate
6. php artisan migrate
7. php artisan serve
Environment (.env)
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task
DB_USERNAME=root
DB_PASSWORD=
API Endpoints
Method | Endpoint | Description
GET | /api/tasks | Get all tasks
POST | /api/tasks | Create new task
GET | /api/tasks/{id} | View task
PUT | /api/tasks/{id} | Update task
DELETE | /api/tasks/{id} | Delete task
Run Unit Tests
php artisan test