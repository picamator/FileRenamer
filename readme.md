FileRenamer
===========

Introduction
------------
Console application for Renaming Files in the directory and subdirectories.

FileRenamer is:
* worked with different rename strategies e.g. microtime, transliteration to Latin of Ukrainian, Russian, Hungarian, Portuguese, German etc.
* provided ability registry new strategies
* created process report in .csv format
* implemented safety algorithm without removing source files. New directory with renamed files will be created.
* followed architecture Patterns
* based on PHP 5.3

Area of usage
-------------
Renaming files in the directory with custom algorithm without deleting original data
were renaming report is essential.

Examples
--------
1. For renaming files in the examples directory please run console command:
```
	php frcon.php -s docs/examples -r mtime
```	
2. To see all registered strategies please run:
```
	php frcon.php -l
```
3. Help can be found by using such command:
```
	php frcon.php -h
```	
