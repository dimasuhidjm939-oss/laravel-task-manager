# Personal Task Manager (Laravel Mini Project)

Project Code: WST21-PM-2026-SF
Student Name: <YOUR NAME HERE>
Course & Year: <YOUR COURSE & YEAR HERE>
Database Used: MySQL

## Features
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Tech Stack
- Laravel (Routes → Controller → Model → Database → Blade)
- MySQL
- Bootstrap 5 (via CDN, for styling only)

## Project Structure
```
app/Http/Controllers/TaskController.php   Handles all task logic (CRUD + status toggle)
app/Models/Task.php                       Eloquent model for the tasks table
database/migrations/..._create_tasks_table.php   Creates the tasks table
resources/views/layouts/app.blade.php     Shared layout (navbar, Bootstrap)
resources/views/tasks/index.blade.php     Task list page
resources/views/tasks/create.blade.php    Add task form
resources/views/tasks/edit.blade.php      Edit task form
routes/web.php                            Route definitions
```

## Setup Instructions

1. Create a new Laravel project (skip if you already have one):
   ```bash
   composer create-project laravel/laravel personal-task-manager
   cd personal-task-manager
   ```

2. Copy the files from this project into your Laravel project, matching folders:
   - `app/Models/Task.php`
   - `app/Http/Controllers/TaskController.php`
   - `database/migrations/2026_09_24_000000_create_tasks_table.php`
   - `resources/views/layouts/app.blade.php`
   - `resources/views/tasks/index.blade.php`
   - `resources/views/tasks/create.blade.php`
   - `resources/views/tasks/edit.blade.php`
   - `routes/web.php` (replace or merge with the default one)

3. Configure your database in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Create the `task_manager` database in MySQL (e.g. via phpMyAdmin or `CREATE DATABASE task_manager;`).

4. Run the migration:
   ```bash
   php artisan migrate
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

6. Open the app at `http://127.0.0.1:8000` — it will redirect to the task list.

## Routes

| Method | URI                  | Action                          | Name                  |
|--------|----------------------|----------------------------------|------------------------|
| GET    | /tasks               | List all tasks                   | tasks.index            |
| GET    | /tasks/create         | Show add task form               | tasks.create            |
| POST   | /tasks               | Save a new task                  | tasks.store             |
| GET    | /tasks/{task}/edit    | Show edit task form              | tasks.edit               |
| PUT    | /tasks/{task}         | Update a task                    | tasks.update             |
| DELETE | /tasks/{task}         | Delete a task                    | tasks.destroy            |
| PATCH  | /tasks/{task}/status  | Toggle Pending / Completed        | tasks.updateStatus       |

## Notes
- Validation is handled in `TaskController` (task_name required, status must be Pending or Completed).
- The status can be changed either from the Edit form, or instantly from the task list using the "Mark as ..." button.
- Styling uses Bootstrap 5 via CDN for a clean look without extra build steps.
