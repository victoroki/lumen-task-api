
# Task Management API

A simple RESTful API built with Lumen for managing tasks. This API supports basic CRUD (Create, Read, Update, Delete) operations and includes filtering, pagination, and search functionality to help users efficiently manage tasks.

## Features

- **CRUD Operations**: Create, read, update, and delete tasks.
- **Task Filtering**: Filter tasks by status and due date.
- **Search Functionality**: Search tasks by title.
- **Pagination**: Paginate the list of tasks for easier viewing.

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- PostgreSQL
- Postman ( for testing the API)

### Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/your-username/task-management-api.git
   cd task-management-api
   ```

2. **Install dependencies**:

   ```bash
   composer install
   ```

3. **Environment Configuration**:

   - Copy the `.env.example` to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Update the `.env` file with your database credentials:

     ```env
     DB_CONNECTION=pgsql
     DB_HOST=127.0.0.1
     DB_PORT=5432
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

4. **Generate Application Key** (if applicable):

   Although Lumen doesn't use an application key by default, you may add `APP_KEY` if using encryption.

5. **Run Migrations**:

   ```bash
   php artisan migrate
   ```

6. **Start the Server**:

   ```bash
   php -S localhost:8000 -t public
   ```

### API Documentation

#### Endpoints

| Method | Endpoint               | Description                 |
|--------|-------------------------|-----------------------------|
| POST   | `/tasks`               | Create a new task           |
| GET    | `/tasks`               | Get all tasks (with optional filters) |
| GET    | `/tasks/{id}`          | Get a specific task by ID   |
| PUT    | `/tasks/{id}`          | Update a specific task      |
| DELETE | `/tasks/{id}`          | Delete a specific task      |

#### Request and Response Examples

1. **Create a Task**

   - **Request**: `POST /tasks`
   - **Body**:
     ```json
     {
       "title": "Finish project",
       "description": "Complete the task management API project",
       "status": "pending",
       "due_date": "2024-12-01"
     }
     ```
   - **Response**:
     ```json
     {
       "id": 1,
       "title": "Finish project",
       "description": "Complete the task management API project",
       "status": "pending",
       "due_date": "2024-12-01",
       "created_at": "2024-10-28T14:35:00.000Z",
       "updated_at": "2024-10-28T14:35:00.000Z"
     }
     ```

2. **Get All Tasks with Filtering and Pagination**

   - **Request**: `GET /tasks?status=pending&due_date=2024-12-01&page=1`
   - **Response**:
     ```json
     {
       "current_page": 1,
       "data": [
         {
           "id": 1,
           "title": "Finish project",
           "description": "Complete the task management API project",
           "status": "pending",
           "due_date": "2024-12-01",
           "created_at": "2024-10-28T14:35:00.000Z",
           "updated_at": "2024-10-28T14:35:00.000Z"
         }
       ],
       "from": 1,
       "last_page": 1,
       "per_page": 15,
       "to": 1,
       "total": 1
     }
     ```

### Validation

- **Title**: Required, must be unique.
- **Status**: Optional, defaults to "pending".
- **Due Date**: Must be a future date if provided.

### Testing

For testing, you can use **Postman** or any other API testing tool to interact with the endpoints. Make sure your server is running (`php -S localhost:8000 -t public`) and use the endpoints as described above.


---

Happy coding!
