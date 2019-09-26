# talk-laravel-vue-graphql

This repository contains a very simple example of a GraphQL implementation with PHP, presented for the first time on [Laravel SP #17](https://www.meetup.com/Laravel-SP/events/264168245/).

## Steps to run it:

First install the Composer and NPM depencies:

    composer install
    npm install

Then copy the .env.example file to .env:

    cp .env.example .env

Migrate and seed the database/example.sqlite file:

    php artisan migrate --seed

Then generate the Laravel key and start the built in server:

    php artisan key:generate
    php artisan serve

The server will start on:

    http://127.0.0.1:8000

And the GraphiQL will be available on:

    http://127.0.0.1:8000/graphiql
