Console application for Renaming Files in the directory and subdirectories.

FileRenamer based on:
- working with different rename strategies e.g. microtime, translit etc.
- providing ability registry new strategies
- creating process report in .csv format
- safety algorithm without removing source files. New directory with renamed files will be created.
- implements architecture Patters
- PHP 5.3

Area of usage.
Renaming files in the directory with custom algoriphm without deleting original data.
Report file helps constract new links for original application.

Examples.
1. For renaming files in the examples directory please run console command:

	php frcon.php -s docs/examples -r mtime


2. To see all registered strategies please run:

	php frcon.php -l


3. Help can be found by using such command:

	php frcon.php -h


or
	php frcon.php






 
