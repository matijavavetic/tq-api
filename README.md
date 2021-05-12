# SWAPI (Star Wars API) - mini project for practice

SWAPI (Star Wars API) is an API client that serves to extend the original SWAPI.dev with new endpoints that can filter results fetched from the original SWAPI. Visit http://swapi.dev/ for more information about the original SWAPI client.

## Postman API documentation
```
https://documenter.getpostman.com/view/8192779/TzCLApbq
```

## Installation
#### Clone the repository
```
git clone https://github.com/matijavavetic/tq-api.git
```

#### Install docker images, up the containers & run local UI server
```
make setup
```

#### Create .env file in src/api:
```
cd src/api
cp .env.example .env
```

#### SSH inside the API container and install packages:
```
make api-ssh
composer install
```
#### Run tests in API container
```
./vendor/bin/phpunit
./vendor/bin/phpunit --group unit
./vendor/bin/phpunit --group integration
./vendor/bin/phpunit --group functional
```
