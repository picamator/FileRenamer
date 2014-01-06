<?php
/**
 * Hash Strategy
 * Rename Strategy based on md5
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;

class Hash extends AbstractStrategy
{
    /**
     * Gets New File Name
     * 
     * @return string 
     */
    protected function getNewFileName() 
    {   
        return md5($this->original_file_name).$this->original_file_extension;
    }
}
