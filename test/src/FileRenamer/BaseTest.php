<?php
/**
 * Base FileRenamer UnitTest
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

abstract class BaseTest extends PHPUnit_Framework_TestCase 
{
    /**
     * Path to the data folder
     * 
     * @var string 
     */
    protected $data_path = './test/data/';
    
    /**
     * Template methods runs once for each test method
     * of the test case class 
     */
    protected function setUp()
    {
        
    }
    
    /**
     * Gets full path to data
     * 
     * @param string $path
     * @retutn string|boolean - full path or false if failed
     */
    protected function getDataPath($path)
    {       
        $fullPath = $this->data_path . $path;
        $dirPath  = (is_file($fullPath)) ? dirname($fullPath) : $fullPath;
       
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
        }

        return realpath($fullPath);
    }
}