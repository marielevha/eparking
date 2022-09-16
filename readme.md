# E-Parking

E-parking application to illustrate how Inertia.js works.

## Installation

Clone the repo locally:

```sh
https://github.com/marielevha/eparking.git eparking
cd eparking
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan app:install init --data --roles
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit E-Parking in your browser ([http://localhost:8000](http://localhost:8000))
