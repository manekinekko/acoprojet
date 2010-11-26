#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --strict --tap --syntax-check --bootstrap ../../config.php --coverage-html PHPUnitTest-coverage --log-graphviz PHPUnitTest.dot $files

