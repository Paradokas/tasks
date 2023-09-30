# Запуск контейнеров
up:
	@docker-compose up -d

# Остановка и удаление контейнеров
down:
	@docker-compose down

# Запуск миграций
migrate:
	@docker-compose exec web php yii migrate

# Установка зависимостей Composer
install:
	@docker-compose exec web composer install

setup: up install migrate
