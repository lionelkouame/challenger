#--- COMPOSER ---#
COMPOSER = composer
COMPOSER_INSTALL = $(COMPOSER) install
COMPOSER_UPDATE = $(COMPOSER) update
#-----------------------------------#

#--- NPM ---#
NPM = npm
NPM_INSTALL = $(NPM) install
NPM_UPDATE = $(NPM) update
NPM_BUILD = $(NPM) run build
NPM_DEV = $(NPM) run dev
NPM_WATCH = $(NPM) run watch
#-----------------------------------#

#--- DOCKER ---#
DOCKER = docker
DOCKER_RUN = $(DOCKER) run
DOCKER_COMPOSE = $(DOCKER) compose
DOCKER_COMPOSE_UP = $(DOCKER_COMPOSE) up -d
DOCKER_COMPOSE_DOWN = $(DOCKER_COMPOSE) down
DOCKER_COMPOSE_BUILD = $(DOCKER_COMPOSE) build
DOCKER_COMPOSE_REBUILD = $(DOCKER_COMPOSE) up --build -d
DOCKER_COMPOSE_RESTART = $(DOCKER_COMPOSE) restart
DOCKER_COMPOSE_STOP = $(DOCKER_COMPOSE) stop
DOCKER_COMPOSE_START = $(DOCKER_COMPOSE) start
DOCKER_COMPOSE_EXEC = $(DOCKER_COMPOSE) exec

#--- PHPQA ---#
PHPQA = jakzal/phpqa
PHPQA_RUN = $(DOCKER_RUN) --init -it --rm -v $(PWD):/project -w /project $(PHPQA)

#--- SYMFONY ---#
SYMFONY = symfony
SYMFONY_SERVER_START = $(SYMFONY) serve -d
SYMFONY_SERVER_STOP = $(SYMFONY) server:stop
SYMFONY_CONSOLE = $(SYMFONY) console
SYMFONY_CONSOLE_CACHE_CLEAR = $(SYMFONY_CONSOLE) cache:clear
SYMFONY_CONSOLE_CACHE_WARMUP = $(SYMFONY_CONSOLE) cache:warmup
SYMFONY_CONSOLE_ASSETS_INSTALL = $(SYMFONY_CONSOLE) assets:install
SYMFONY_CONSOLE_MIGRATIONS_MIGRATE = $(SYMFONY_CONSOLE) doctrine:migrations:migrate
SYMFONY_LINT= $(SYMFONY) lint

#--- PHP_UNIT ---#
PHP_UNIT= APP_ENV=test  $(SYMFONY) php bin/phpunit
#-----------------------------------#

docker-up:
	$(DOCKER_COMPOSE_UP)
.PHONY: docker-up

docker-down:
	$(DOCKER_COMPOSE_DOWN)
.PHONY: docker-down

sf-start:
	$(SYMFONY_SERVER_START)
.PHONY: sf-start

sf-log:
	$(SYMFONY) server:log
.PHONY: sf-log

sf-debug-env:
	$(SYMFONY) debug:dump
.PHONY: sf-debug-env

sf-dump-env-container:
	$(SYMFONY) debug:container --env-vars
.PHONY: sf-dump-env-container

qa-cs-fixer:
	$(PHPQA_RUN) php-cs-fixer fix ./src --rules=@Symfony --verbose --dry-run
.PHONY: qa-cs-fixer-dry-run

qa-php-metrics:
	$(PHPQA_RUN) phpmetrics --report-html=var/phpmetrics ./src
.PHONY: qa-php-metrics

wf-category-challenge:
	symfony console  workflow:dump wf_category_challenge | dot -Tpng -o wf_category_challenge.png
