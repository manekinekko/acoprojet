#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --tap --syntax-check --bootstrap ../../config.php --testdox-html PHPUnitTest-testdox.html --coverage-html PHPUnitTest-coverage $files
