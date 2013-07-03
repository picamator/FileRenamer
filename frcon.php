<?php
/**
 * Console version of FileRenamer
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

$path = realpath('../');
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

include_once('Autoload.php');

// identifing options
$shortopts  = '';
$shortopts .= 's:'; // source
$shortopts .= 'r:'; // rename strategy
$shortopts .= 'l::'; // strategy list
$shortopts .= 'd::'; // destination path
$shortopts .= 'h';   // help   

// run
$strategies = parse_ini_file('configs/strategies.ini', true);
$options    = getopt($shortopts);

$console    = new FileRenamer\Console($options, $strategies);
$console->run();