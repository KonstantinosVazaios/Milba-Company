

- git clone
- composer install
- cp .env.example .env
- php artisan key:generate
- Create an empty database for our application
- In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.
- php artisan migrate
- php artisan db:seed
- In the .env set the BROADCAST_DRIVER=pusher and fill in the PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET with random unique values
- In the .env also fill in the PUSHER_HOST, PUSHER_PORT, PUSHER_USE_TLS, PUSHER_SCHEME or leave as default
- make sure PUSHER_HOST is the host where your laravel application is running (in most cases is going to be 127.0.0.1)
- Open a terminal window and run php artisan serve
- Open another terminal window and run php artisan websocket:serve
- Connect from you client app using LARAVEL ECHO NPM PACKAGE
- Now connect to the backoffice and create a new order or select an existing one and send it for print
- Admin Credentials located in the DatabaseSeeder.php file
