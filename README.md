# SWAPI (Star Wars API)

## Clone the repository
```
git clone https://github.com/matijavavetic/tq-api.git
```

## Installation
#### Install docker images, up the containers & run local UI server
```
make setup
```

#### Create .env file in src/api:
```
cd src/api
cp .env.example .env
```

#### SSH inside the API container and run the tests:
```
make api-ssh
./vendor/bin/phpunit
```
##### Group testing (optional)
```
./vendor/bin/phpunit --group unit
./vendor/bin/phpunit --group integration
./vendor/bin/phpunit --group functional
```