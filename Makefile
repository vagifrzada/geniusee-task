init: pull-images up composer-install migrate

pull-images:
	docker-compose pull
composer-install:
	docker-compose exec php composer install
migrate:
	docker-compose exec php php artisan migrate
up:
	docker-compose up -d
