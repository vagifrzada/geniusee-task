init: pull-images build composer-install generate migrate up # user storage-link

pull-images:
	docker-compose pull
build:
	docker-compose build
composer-install:
	docker-compose run --rm php-cli composer install
generate:
	docker-compose run --rm php-cli php artisan key:generate
migrate:
	docker-compose run --rm php-cli php artisan migrate
user:
	docker-compose run --rm php-cli php artisan make:user
storage-link:
	docker-compose run --rm php-cli php artisan storage:link
sync:
	docker-compose run --rm php-cli php artisan sync:flavors
composer-update:
	docker-compose run --rm php-cli composer update
up:
	docker-compose up -d
