#! /bin/sh

files=`find . -iname "*Test.php"`
phpunit --tap --colors --coverage-html PHPUnitTest.html $files
