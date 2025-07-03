## Lumera

A personal blogging platform built with Laravel, Blade, Alpine.js, and Tailwind CSS—where users can register, write, and publish their own articles. Designed as a learning project to showcase full-stack skills in a modern Laravel environment.

## 🚀 Table of Contents

-   [Features]
-   [Tech Stack]
-   [Getting Started]
-   [Configuration]
-   [License]

## ⭐ Features

-   **[User registration, authentication & authorization]**
-   **[Role-based access control: admin & user roles]**
-   **[CRUD operations: create, read, update, delete posts]**
-   **[Alpine.js-enhanced interactivity]**

## 🧩 Tech Stack

| Layer      | Technology              |
| ---------- | ----------------------- |
| Backend    | Laravel 12              |
| Templating | Blade                   |
| Frontend   | Tailwind CSS, Alpine.js |
| Database   | MySQL / SQLite          |
| Dev Tools  | Composer, NPM, Vite     |

## 🎯 Getting Started

Follow these steps to run Lumera locally:

```
# 1. Clone the repo
git clone https://github.com/your-username/lumera.git
cd lumera

# 2. Install backend dependencies
composer install

# 3. Copy and configure environment
cp .env.example .env
php artisan key:generate

# 4. Set up your database in `.env`

# 5. Run migrations
php artisan migrate

# 6. Install frontend dependencies & build assets
npm install
npm run build    # or `npm run dev` for development

# 7. Start the server
php artisan serve

```

➡️ Visit: http://localhost:8000

## ⚙️ Configuration

.env file: Set DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD. Ensure .env is in .gitignore to protect sensitive data

## License

Distributed under the MIT License — feel free to inspect, modify, or build on it.
