<?php
/**
 * Console version of FileRenamer
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer;

// Autoload
include_once('./src/autoload.php');

// identifing options
$shortopts  = '';
$shortopts .= 's:'; // source
$shortopts .= 'r:'; // rename strategy
$shortopts .= 'l::'; // strategy list
$shortopts .= 'd::'; // destination path
$shortopts .= 'h';   // help   

// run
$strategies = parse_ini_file('config/strategies.ini', true);
$options    = getopt($shortopts);

$console    = new Console($options, $strategies);
$console->run();
