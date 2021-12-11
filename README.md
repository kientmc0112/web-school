cp .env.example .env

docker-compose build

docker-compose up -d

docker-compose exec laravel bash

composer install

php artisan key:generate

npm install

npm run dev

# DB

http://localhost/adminer.php

server: mysql
user: root
pass: root
