<?php
/**
 * Csv Report
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Report;

class Csv implements ReportInterface
{
    const PATH = './data/report/';
    
    /**
     * Headers of the report
     * 
     * @var Array 
     */
    protected $headers = array('Original File Name', 'New File Name', 'Result');
    
    /**
     * Link to the file resource
     * 
     * @var resource
     */
    protected $file;
    
    /**
     * Report Path
     * 
     * @var string 
     */
    protected $report_path;
    
    /**
     * @throws FileRenamer\GeneralException
     */
    public function __construct()
    {
        if(!is_writable(self::PATH)) {
            throw new FileRenamer\GeneralException('Error: Report directory "'.self::PATH.'" does not have write permission. Please add write permision');
        }
        

        $this->report_path  = self::PATH.'report_'.date('Y_m_d_H_i_s').'.csv';
        $this->file         = fopen($this->report_path , 'a+');
        
        $this->save($this->headers);
    }
    
    /**
     * Save Data item into report file
     * 
     * @param array $data
     * @return integer|false - length of the written string or FALSE on failure. 
     */
    public function save(array $data) 
    {
        return fputcsv($this->file, $data);
    }
    
    /**
     * Gets Report Path
     * 
     * @return string 
     */
    public function getReportPath()
    {
        return $this->report_path;
    }
}
