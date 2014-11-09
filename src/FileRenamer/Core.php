<?php
/**
 * FileRenamer Core
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer;

class Core
{
    /**
     * Path to folder 
     * contains files for renaming
     * 
     * @var string 
     */
    protected $source_path;
    
    /**
     * Path to folder 
     * where renamed files should be saved
     * 
     * @var string 
     */
    protected $destinatoin_path;
    
    /**
     * Prefix for destination path
     * Use only if $destination_path does not set
     * 
     * @var string 
     */
    protected $destination_prefix = '_renamed';
    
    /**
     * FileRenamer Strategy
     * 
     * @var Strategy\StrategyInterface
     */
    protected $strategy;
    
    /**
     * FileRenamer Report
     * 
     * @var Report\ReportInterface
     */
    protected $report;
    
    /**
     * @param string $source_path
     * @param Strategy\StrategyInterface $strategy
     * @param Report\ReportInterface $report 
     */
    public function __construct($source_path, Strategy\StrategyInterface $strategy, Report\ReportInterface $report) 
    {
        $this->setSourcePath($source_path);
        
        $this->strategy = $strategy;
        $this->report   = $report;
    }
    
    /**
     * Sets Destination Path
     * 
     * @param string $destination_path 
     * @return self
     */
    public function setDestinationPath($destination_path)
    {
        $this->destinatoin_path = $destination_path;
        
        return $this;
    }
    
    /**
     * Run FileRenamer
     * Skip directories '.' and '..' 
     * 
     * @param string $source_path
     * $return void
     */
    public function run($source_path = null)
    {
        $source_path = (is_null($source_path))? $this->source_path: $source_path;           
        // read source directory
        foreach (new \DirectoryIterator($source_path) as $file_info) {
            if($file_info->isDot()) { 
                continue;
            }
                      
            $destination_path = $this->getDestinationPath().str_replace($this->source_path, '', $file_info->getPath());   
            if(!file_exists($destination_path)) {
                mkdir($destination_path, 0777, true);
            }
            
            if($file_info->isDir()) {
                $this->run($file_info->getPathname());
            } else {  
                $file_extension = $file_info->getExtension();
                $result = $this->strategy->setSourcePath($file_info->getPathname())
                    ->setDestinationPath($destination_path)
                    ->setOriginalFileName($file_info->getBasename('.'.$file_extension))
                    ->setOriginalFileExtension($file_extension)
                    ->rename();
            
                 $this->report->save($result);
            }
        }
    }
    
    /**
     * Sets Source Path
     * 
     * @param string $source_path 
     * @return self
     * @throws RuntimeException
     */
    protected function setSourcePath($source_path)
    {
        $source_path = trim($source_path);
        
        if(!file_exists($source_path) || !is_readable($source_path)) {
            throw new RuntimeException('Error: Source Path "'.$source_path.'" does not exist or has not read permission. Please set propper Source Path or pemission.');
        }
        
        $this->source_path = $source_path;
        
        return $this;
    }
    
    /**
     * Gets Destination Path
     * 
     * @return string 
     * @throws RuntimeException
     */
    protected function getDestinationPath()
    {
        if(!is_null($this->destinatoin_path)) {
            return $this->destinatoin_path;
        }
        
        $source_path_base   = basename($this->source_path);
        $source_path_parent = dirname($this->source_path);
        
        if(!is_writable($source_path_parent)) {
            throw new RuntimeException('Error: Destination Path "'.$source_path_parent.'" does not have not write permission. Please set other Destination Path or pemission.');
        }
        
        $destination_dir        = $source_path_base.$this->getDestinationPrefix();
        $destination_path       = str_replace($source_path_base, $destination_dir, $this->source_path);
        
        $this->destinatoin_path = $destination_path;
        
        return $this->destinatoin_path;
    }
    
    /**
     * Gets Destination Prefix
     *  
     * @return string
     */
    protected function getDestinationPrefix()
    {      
        return $this->destination_prefix . '_' . date('Y_m_d_H_i_s');
    }
}
