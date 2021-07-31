init: pull-images build composer-install migrate up

pull-images:
	docker-compose pull
build:
	docker-compose build
composer-install:
	docker-compose exec php composer install
migrate:
	docker-compose exec php php artisan migrate
composer-update:
	docker-compose exec php composer update
up:
	docker-compose up -d
