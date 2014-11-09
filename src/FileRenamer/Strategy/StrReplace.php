<?php
/**
 * StrReplace Strategy 
 * Rename strategy based on php internal function "str_replace"
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;
use FileRenamer\RuntimeException;

class StrReplace extends AbstractStrategy
{
    protected $replace_pair = array();
    
    /**
     * Sets Replace Pair
     * 
     * @param array $replace_pair
     * @return self
     */
    public function setReplacePair(array $replace_pair)
    {
        $this->replace_pair = $replace_pair;
        
        return $this;
    }
    
    /**
     * Gets New File Name
     * 
     * @return string 
     */
    protected function getNewFileName() 
    {   
        $replace_pair   = $this->getReplacePair();
        $new_file_name  = str_replace(array_keys($replace_pair), array_values($replace_pair), $this->original_file_name);
        
        return $new_file_name.$this->original_file_extension;
    }
    
    /**
     * Gets Replace Pair
     * 
     * @return array
     * @throws RuntimeException
     */
    protected function getReplacePair()
    {
        if(empty($this->replace_pair)) {
            throw new RuntimeException('Error: Replace Pair does not set. Please set Replace Pair and try agan.');
        }
        
        return $this->replace_pair;
    }
}
