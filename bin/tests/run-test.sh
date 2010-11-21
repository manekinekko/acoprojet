#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --tap --syntax-check --bootstrap ../../config.php --coverage-html PHPUnitTest-coverage $files

