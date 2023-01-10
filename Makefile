install: # install composer
	composer install

brain-games: # shortcut to start brain games
	./bin/brain-games

validate: # validate composer package
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin