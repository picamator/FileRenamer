<?php
/**
 * Strategy Interface
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy;

interface StrategyInterface
{    
    /**
     * Sets Souce Path
     * 
     * @param string $source_path
     * @return self 
     */
    public function setSourcePath($source_path);
    
    /**
     * Sets Destination Path
     * 
     * @param string $destination_path
     * @return self 
     */
    public function setDestinationPath($destination_path);
    
    /**
     * Sets Original File Name
     * 
     * @param string $original_file_name
     * @return self
     */
    public function setOriginalFileName($original_file_name);
    
    /**
     * Sets Original File Extension
     * 
     * @param string $destination_path
     * @return self
     */
    public function setOriginalFileExtension($original_file_extension);
    
    /**
     * Rename file and copy
     * to the current location
     * 
     * @return array 
     */
    public function rename();
}
