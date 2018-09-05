.PHONY: init-db
init-db:
	docker-compose run --rm php bin/init-db

.PHONY: install-deps
install-deps:
	docker-compose run --rm php composer install

.PHONY: load-fixtures
load-fixtures:
	docker-compose run --rm php bin/load-fixtures

.PHONY: start
start:
	docker-compose up -d
