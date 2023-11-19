export COMPOSE_PROJECT_NAME=local
export WEB_PORT_HTTP=8001
export WEB_PORT_SSL=443
export XDEBUG_CONFIG=main
export MYSQL_VERSION=8.1
export INNODB_USE_NATIVE_AIO=1
export SQL_MODE=ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION

# Determine if .env file exist
ifneq ("$(wildcard .env)","")
	include .env
endif

ifndef INSIDE_DOCKER_CONTAINER
	INSIDE_DOCKER_CONTAINER = 0
endif

HOST_UID := $(shell id -u)
HOST_GID := $(shell id -g)
PHP_USER := -u www-data
PROJECT_NAME := -p ${COMPOSE_PROJECT_NAME}
INTERACTIVE := $(shell [ -t 0 ] && echo 1)
ERROR_ONLY_FOR_HOST = @printf "\033[33mThis command for host machine\033[39m\n"
.DEFAULT_GOAL := help
ifneq ($(INTERACTIVE), 1)
	OPTION_T := -T
endif
ifeq ($(GITLAB_CI), 1)
	# Determine additional params for phpunit in order to generate coverage badge on GitLabCI side
	PHPUNIT_OPTIONS := --coverage-text --colors=never
endif

help: ## Shows available commands with description
	@echo "\033[34mList of available commands:\033[39m"
	@grep -E '^[a-zA-Z-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "[32m%-27s[0m %s\n", $$1, $$2}'



build: ## Build dev environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) WEB_PORT_HTTP=$(WEB_PORT_HTTP) WEB_PORT_SSL=$(WEB_PORT_SSL) XDEBUG_CONFIG=$(XDEBUG_CONFIG) MYSQL_VERSION=$(MYSQL_VERSION) INNODB_USE_NATIVE_AIO=$(INNODB_USE_NATIVE_AIO) SQL_MODE=$(SQL_MODE) docker-compose -f docker-compose.yml build
else
	$(ERROR_ONLY_FOR_HOST)
endif

start: ## Start dev environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) WEB_PORT_HTTP=$(WEB_PORT_HTTP) WEB_PORT_SSL=$(WEB_PORT_SSL) XDEBUG_CONFIG=$(XDEBUG_CONFIG) MYSQL_VERSION=$(MYSQL_VERSION) INNODB_USE_NATIVE_AIO=$(INNODB_USE_NATIVE_AIO) SQL_MODE=$(SQL_MODE) docker-compose -f docker-compose.yml $(PROJECT_NAME) up -d
else
	$(ERROR_ONLY_FOR_HOST)
endif
exec:
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@$$cmd
else
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) WEB_PORT_HTTP=$(WEB_PORT_HTTP) WEB_PORT_SSL=$(WEB_PORT_SSL) XDEBUG_CONFIG=$(XDEBUG_CONFIG) MYSQL_VERSION=$(MYSQL_VERSION) INNODB_USE_NATIVE_AIO=$(INNODB_USE_NATIVE_AIO) SQL_MODE=$(SQL_MODE) docker-compose $(PROJECT_NAME) exec $(OPTION_T) $(PHP_USER) laravel $$cmd
endif
exec-bash:
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@bash -c "$(cmd)"
else
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) WEB_PORT_HTTP=$(WEB_PORT_HTTP) WEB_PORT_SSL=$(WEB_PORT_SSL) XDEBUG_CONFIG=$(XDEBUG_CONFIG) MYSQL_VERSION=$(MYSQL_VERSION) INNODB_USE_NATIVE_AIO=$(INNODB_USE_NATIVE_AIO) SQL_MODE=$(SQL_MODE) docker-compose $(PROJECT_NAME) exec $(OPTION_T) $(PHP_USER) laravel bash -c "$(cmd)"
endif


check-node: ## Runs all migrations for main/test databases
	@make exec-bash cmd="node -v"
	@make exec-bash cmd="npm -v"
	
build-assets: 
	@make exec cmd="npm i"
	@make exec cmd="npm run build"

composer-install: ## Installs composer dependencies
	@make exec-bash cmd="COMPOSER_MEMORY_LIMIT=-1 composer install --optimize-autoloader"
migrate: ## Runs all migrations for main/test databases
	@make exec cmd="php artisan migrate --force"
	@make exec cmd="php artisan migrate --force --env=test"
seed: ## Runs all seeds for test database
	@make exec cmd="php artisan db:seed --force"
setup-permission: # Setup admin and permissions
	@make exec cmd="php artisan setup:permission"
optimize:
	@make exec cmd="php artisan optimize:clear"