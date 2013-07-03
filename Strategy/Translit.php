<?php
/**
 * Translit Strategy
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;

class Translit extends AbstractStrategy
{
    /**
     * Gets New File Name
     * 
     * @return string 
     */
    protected function getNewFileName() 
    {   
        $result = iconv("UTF-8", "ASCII//TRANSLIT", $this->original_file_name);
		$result = str_replace(array('\\', '/', ':', '*', '?', '"', '`', "'"), '', $result);
		$result .= $this->original_file_extension;
		
		return $result;		
    }
}
