Console application for Renaming Files in the directory and subdirectories.

FileRenamer based on:
- working with different rename strategies e.g. microtime, transliteration to Latin of Ukrainian, Russian, Hungarian, Portuguese, German etc.
- providing ability registry new strategies
- creating process report in .csv format
- safety algorithm without removing source files. New directory with renamed files will be created.
- implements architecture Patterns
- PHP 5.3

Area of usage.
Renaming files in the directory with custom algorithm without deleting original data.
Report file helps construct new links for original application.

Examples.
1. For renaming files in the examples directory please run console command:

	<code>php frcon.php -s docs/examples -r mtime</code>

2. To see all registered strategies please run:

	<code>php frcon.php -l</code>

3. Help can be found by using such command:

	<code>php frcon.php -h</code>
