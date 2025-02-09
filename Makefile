#!/bin/bash

help: ## Muestra los comandos del archivo
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

phpstan: ## Ejecuta PHPStan
	./vendor/bin/phpstan analyse -c phpstan.neon

code-style: ## Aplica PHP CS Fixer a nuestro proyecto
	./vendor/bin/php-cs-fixer fix
