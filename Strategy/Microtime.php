<?php
/**
 * Microtime Strategy
 * Rename strategy based on Microtime
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;

class Microtime extends AbstractStrategy
{
    /**
     * Gets New File Name
     * 
     * @return string 
     */
    protected function getNewFileName() 
    {   
        return microtime(true).$this->original_file_extension;
    }
}
