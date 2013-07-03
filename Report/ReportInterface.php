<?php
/**
 * FileRenamer Report Interface
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Report;

interface ReportInterface
{
    /**
     * Save Data item into report file
     * 
     * @param array $data
     * @return integer|false - length of the written string or FALSE on failure. 
     */
    public function save(array $data);
}
