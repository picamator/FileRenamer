<?php
/**
 * Core FileRenamer UnitTest
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer;

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
     * @var Report\Csv 
     */
    protected $report;
    
    /**
     * @see BaseTest
     */
    protected function setUp() 
    {
        parent::setUp();
        
        $this->source_path = $this->data_path.'RenameMe';
        $this->report      = new Report\Csv;        
    }
    
    /**
     * Test for Hash Strategy
     * 
     * @param Strategy\StrategyInterface $strategy 
     * @dataProvider strategyProvider
     */
    public function testStrategy(Strategy\StrategyInterface $strategy)
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
            array(new Strategy\Hash),
            array(new Strategy\Microtime),
            array(new Strategy\Translit\General),
            array(new Strategy\Translit\Ukrainian),
            array(new Strategy\Translit\Russian),
            array(new Strategy\Translit\Hungarian),
            array(new Strategy\Translit\Portuguese),
            array(new Strategy\Translit\German)
        );
    }
}
