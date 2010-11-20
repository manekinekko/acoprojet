#! /bin/sh

files=`find . -iname "*Test.php"`

#for i in $files; 
#do
	#n=`basename $i .php`
	phpunit --coverage-html PHPUnitTest.html $files
#done;
