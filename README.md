#Weather Recommendation API Test Project

## Installation

Before developing, install packages by running:

`composer install`

## Database

To create and populate database run:

1. `bin/console doctrine:database:create`
2. `bin/console doctrine:migrations:migrate` and `yes`
3. `bin/console doctrine:fixtures:load` and `yes`

## Running

To start the server run:

`symfony server:start`

or

`php -S 127.0.0.1.8000 -t public/`

## Instructions

Open website at 

`http://127.0.0.1:8000/api/products/{city}`

where `{city}` is your wanted city