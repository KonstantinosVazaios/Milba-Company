

- git clone
- composer install
- cp .env.example .env
- php artisan key:generate
- Create an empty database for our application
- In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.
- php artisan migrate
- php artisan db:seed
- In the .env set the BROADCAST_DRIVER=pusher and fill in the PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET with random unique values

