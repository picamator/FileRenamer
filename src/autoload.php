<?php
/**
 * FileRenamer Autoload
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer;

function autoload($class)
{    
    include_once (str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');
}

spl_autoload_register(__NAMESPACE__ . '\autoload');
