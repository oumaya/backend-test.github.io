pour le test unitaire j'ai utilisé composer, ici les etapes à suivre: 

PHP Archive (PHAR)

➜ wget -O phpunit https://phar.phpunit.de/phpunit-8.phar

➜ chmod +x phpunit

Composer

➜ composer require --dev phpunit/phpunit ^8

➜ ./vendor/bin/phpunit --version

exercice paths:

src : pour Robot.php
tests: pour RobotTest.php


commande d'excution : 
php run.php

commande de test :

./vendor/bin/phpunit tests
php vendor/bin/phpunit test
