# Laravel Event Platform — Learning Project

A Laravel application created as a full-stack learning exercise, with a separate `Front-end` directory in the repository.

## Project structure
- `app/` — Laravel application code.
- `routes/` — web and API route definitions.
- `database/` — database setup and migrations.
- `Front-end/` — separate frontend folder.
- `resources/` — Laravel resources and views.

The existing web routes include authentication-protected dashboard and profile routes. Other features should be checked in the source before describing the application as a complete event-booking service.

## Technologies
PHP · Laravel · JavaScript · Vite

## Local setup
Prerequisites: PHP, Composer, Node.js and a database configured for the application.

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
```

Configure the database in `.env`, then (when appropriate for your database):

```bash
php artisan migrate
php artisan serve
```

Use `npm run dev` for frontend assets. The separate `Front-end` directory may require its own setup.

## Status
Educational repository. Review the current frontend/backend integration and configuration before deploying.
