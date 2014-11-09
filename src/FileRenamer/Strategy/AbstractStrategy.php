<?php
/**
 * FileRenamer Strategy Abstract
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;

abstract class AbstractStrategy implements StrategyInterface
{ 
    /**
     * Source Path
     *  
     * @var string 
     */
    protected $source_path;
    
    /**
     * Destination Path
     * 
     * @var string 
     */
    protected $destination_path;
    
    /**
     * Original File Name
     * 
     * @var string 
     */
    protected $original_file_name;
    
    /**
     * Original File Extension
     * 
     * @var string 
     */
    protected $original_file_extension;
    
    /**
     * Sets Source Path
     * 
     * @param string $source_path 
     * @return self
     */
    public function setSourcePath($source_path)
    {
        $this->source_path = $source_path;
        
        return $this;
    }
    
    /**
     * Sets Destination Path
     * 
     * @param string $destination_path 
     * @return self
     */
    public function setDestinationPath($destination_path)
    {
        $this->destination_path = $destination_path;
        
        return $this;
    }
    
    /**
     * Sets Original File Name
     * 
     * @param string $original_file_name
     * @return self
     */
    public function setOriginalFileName($original_file_name)
    {
        $this->original_file_name = $original_file_name;
        
        return $this;
    }
    
    /**
     * Sets Original File Extension
     * 
     * @param string $original_file_extension
     * @return self
     */
    public function setOriginalFileExtension($original_file_extension)
    {
        $this->original_file_extension = '.' . $original_file_extension;
        
        return $this;
    }
    
    /**
     * Rename file and copy
     * to the current location
     * 
     * @return array 
     */
    public function rename()
    {      
        $destination_path   = $this->destination_path.DIRECTORY_SEPARATOR.$this->getNewFileName();
        $result             = copy($this->source_path, $destination_path);
        
        return array($this->source_path, $destination_path, $result);
    }
    
    /**
     * Gets New File Name
     * 
     * @return string 
     */
    abstract protected function getNewFileName();
}
