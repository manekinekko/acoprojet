#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --strict --tap --syntax-check --bootstrap ../../config.php --coverage-html PHPUnitTest-coverage PHPUnitTest.dot $files

