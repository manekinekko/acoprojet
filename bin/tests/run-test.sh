#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --colors --verbose --strict --tap --syntax-check --bootstrap ../../config.php --coverage-html PHPUnitTest-coverage PHPUnitTest.dot $files

