<?php
/**
 * Core FileRenamer UnitTest
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use FileRenamer\Core;
use FileRenamer\Report\Csv;
use FileRenamer\Strategy\StrategyInterface;
use FileRenamer\Strategy\Hash;
use FileRenamer\Strategy\Microtime;
use FileRenamer\Strategy\Translit\General;
use FileRenamer\Strategy\Translit\Ukrainian;
use FileRenamer\Strategy\Translit\Russian;
use FileRenamer\Strategy\Translit\Hungarian;
use FileRenamer\Strategy\Translit\Portuguese;
use FileRenamer\Strategy\Translit\German;

class CoreTest extends BaseTest
{
    /**
     * Path to the Source folder
     * 
     * @var string 
     */
    protected $source_path;
    
    /**
     * Report
     * 
     * @var Csv 
     */
    protected $report;
    
    /**
     * @see BaseTest
     */
    protected function setUp() 
    {
        parent::setUp();
        
        $this->source_path = $this->getDataPath('RenameMe');
        $this->report      = new Csv();        
    }
    
    /**
     * Test for Hash Strategy
     * 
     * @param StrategyInterface $strategy 
     * @dataProvider strategyProvider
     */
    public function testStrategy(StrategyInterface $strategy)
    {   
        $core = new Core($this->source_path, $strategy, $this->report);
        $core->run();
        
        $report_path = $this->report->getReportPath();
        $this->assertTrue(file_exists($report_path));
    }
    
    /**
     * Data Provider for testStrategy
     * 
     * @return array
     */
    public function strategyProvider()
    {
        return array(
            array(new Hash()),
            array(new Microtime()),
            array(new General()),
            array(new Ukrainian()),
            array(new Russian()),
            array(new Hungarian()),
            array(new Portuguese()),
            array(new German())
        );
    }
}
