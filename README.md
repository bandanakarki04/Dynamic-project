# Dynamic Project – Business Solution System

A Laravel 12 web application for managing business problems, solutions, products, tags, and KPIs.

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL or MariaDB
- PHP MySQL extension (`pdo_mysql`)

## Local Setup

### 1. Install PHP dependencies

```bash
composer install
```

### 2. Create your local environment file

```cmd
copy .env.example .env
```

### 3. Generate the application key

```bash
php artisan key:generate
```

### 4. Configure the MySQL database

Create an empty development database in MySQL/MariaDB.

Configure the following settings in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=business_solution_system
DB_USERNAME=root
DB_PASSWORD=
```

Update the database username and password according to your local MySQL configuration.

### 5. Run database migrations and seed sample data

```bash
php artisan migrate --seed
```

### 6. Install frontend dependencies and build assets

```bash
npm install
npm run build
```

### 7. Start the Laravel development server

```bash
php artisan serve
```

Open the application at:

http://127.0.0.1:8000

## Problem Search – User Story 1

The Problems page is publicly accessible at `/problems` without requiring users to log in.

Features include:

- Search problems by name or description.
- View solutions connected to each problem through the `problem_solution` many-to-many pivot table.
- Preserve search terms when navigating through pagination.
- Display related solutions using Laravel Eloquent relationships and eager loading.

The database seeder creates two sample problems and one shared solution linked to both problems.

The seeder uses `firstOrCreate` and `syncWithoutDetaching` to avoid duplicate sample records and pivot links when executed repeatedly.

## Tests

Run the automated test suite with:

```bash
php artisan test
```

The current feature tests cover:

- Public access to the Problems page without login.
- Searching problems by name and description.
- Displaying related solutions.
- Linking one solution to multiple problems through the database seeder.
- Filtering products by solution.
- Filtering products by tag.
- Filtering products by both solution and tag.
- Returning only the product list for AJAX filtering requests.

## Database Export

Export the database only after confirming that its schema and data are consistent with the current migrations and application models.

For MySQL/MariaDB:

```bash
mysqldump -u YOUR_DB_USER -p YOUR_DATABASE_NAME > database-sql/business_solution_system.sql
```

Before committing the SQL export:

- Verify that all required application tables and relationships are included.
- Ensure that the `sf_` table prefix is consistent.
- Check that the `sf_solutions` table includes the `category` column.
- Do not include personal session data, credentials, or sensitive information.

The previously supplied SQL dump should not be used for a fresh installation without correcting its schema and migration history.

## Version Control and Security

- Do not commit the `.env` file.
- Do not commit passwords, application keys, session tokens, or other credentials.
- Use Git and GitHub for collaborative development and version control.
