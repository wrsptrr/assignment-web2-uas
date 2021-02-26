# ASSIGNMENT

This is the repository for the final web project from the campus

## Instalation

1. Clone this repo:

```bash
git clone https://github.com/wrsptrr/assignment-web2-uas.git
```

2. Install the dependencies:

```bash
composer install
```
3. Copy the .env.example and rename to .env

4. Edit DB_DATABASE in the .env file to setup your database

5. Generate key:

```bash
php artisan key:generate
```

6. Migrate the database:

```bash
php artisan migrate
```

7. Start the app:
```bash
php artisan serve
```

The app will be served at `localhost:8000`
