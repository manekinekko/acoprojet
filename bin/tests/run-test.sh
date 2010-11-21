#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --tap --colors --syntax-check --bootstrap ../../config.php --coverage-html PHPUnitTest.html $files
