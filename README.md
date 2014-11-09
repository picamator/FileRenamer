FileRenamer
===========

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b90dc96e-9321-49f4-a34e-19d1d683c91c/mini.png)](https://insight.sensiolabs.com/projects/b90dc96e-9321-49f4-a34e-19d1d683c91c)

Console application for Renaming Files in the directory and subdirectories by special rules.

FileRenamer is:

* worked with different rename strategies e.g. microtime, transliteration to Latin of Ukrainian, Russian, Hungarian, Portuguese, German etc.
* provided ability registry new strategies
* created process report in .csv format
* implemented safety algorithm without removing source files. New directory with renamed files will be created.

Requirements
------------
* PHP 5.3+

Usage
-----
For renaming files in the examples directory please run console command:
```
    php frcon.php -s test/data/RenameMe -r mtime 
```	

To see all registered strategies please run:
```
	php frcon.php -l
```

Help can be found by using such command:
```
	php frcon.php -h
```	

phpDocumentor
-------------
To regenerate phpdoc please:

* install [phpdoc](http://www.phpdoc.org/docs/latest/getting-started/installing.html)
* run ``./script/phpdoc.sh``

License
-------
BSD-3-Clause
