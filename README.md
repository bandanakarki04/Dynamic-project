# Dynamic Project – Business Solution System

A Laravel 12 application for managing problems, solutions, products, tags and KPIs.

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL/MariaDB or SQLite

## Local setup

1. Install PHP dependencies:

   ```bash
   composer install
   ```

2. Create your local environment file:

   ```cmd
   copy .env.example .env
   ```

3. Generate the application key:

   ```bash
   php artisan key:generate
   ```

4. For MySQL/MariaDB, create an **empty development database** first and set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`. The MySQL connection intentionally uses the `sf_` table prefix. Laravel therefore creates framework tables such as `sf_users` and `sf_migrations`, as well as application tables such as `sf_problems` and `sf_solutions`.

   Do not import the previously supplied `database-sql/business_solution_system.sql` into a fresh or existing database as-is. That dump mixes prefixed application tables with unprefixed framework tables, its `sf_solutions` table is missing the `category` column required by the current model/migration, and its migration history does not describe all tables in the dump.

5. Run migrations and sample data against the empty development database:

   ```bash
   php artisan migrate --seed
   ```

6. Install frontend dependencies and build assets:

   ```bash
   npm install
   npm run build
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

   Open `http://127.0.0.1:8000`.

## Problem search – User Story 1

The Problems page is available to authenticated users at `/problems`.

- Search problems by name or description.
- View solutions connected to each problem through the `problem_solution` many-to-many pivot table.
- Search terms remain in the URL when navigating pagination.
- The database seeder creates two sample problems and one shared solution linked to both problems, demonstrating the multi-problem-to-one-solution relationship.
- The seeder uses `firstOrCreate` and `syncWithoutDetaching`, so running it again does not create duplicate sample records or duplicate pivot links.

The demo account created by the seeder is `test@example.com` with password `password`. Change or remove this demo account before deploying the application.

## Tests

Run the automated tests with:

```bash
php artisan test
```

The Problem feature tests cover login protection, searching by problem name and description, displaying related solutions, and seeding one solution linked to multiple problems.

## Database export

After running all migrations against the database you intend to submit, create the SQL export from that database. For MySQL/MariaDB:

```bash
mysqldump -u YOUR_DB_USER -p YOUR_DATABASE_NAME > database-sql/business_solution_system.sql
```

Do not commit `.env`, passwords, local session data, or other credentials to Git.
