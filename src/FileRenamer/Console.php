<?php
/**
 * FileRenamer Console
 * Handler of console commands
 * 
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer;

class Console
{
    const DATA_TIME = 'Y-m-d H:i:s';
    
    /**
     * Options from console
     * 
     * @var Array 
     */
    protected $options;
    
    /**
     * Strategies list
     * 
     * @var Array 
     */
    protected $strategies;
    
    /**
     * @param array $options
     * @param array $strategies 
     */
    public function __construct(array $options, array $strategies) 
    {
        $this->options      = $options;
        $this->strategies   = $strategies;
    }
    
    public function run()
    {
        switch(true) {            
            case (isset($this->options['l'])):
                $this->runStrategyList();
                break;
            
            case (isset($this->options['s']) && isset($this->options['r'])):
                $this->runStrategy();
                break;
            
            default:
                $this->runHelp();
        }
    }
    
    /**
     * Displays help text
     * 
     * @return void 
     */
    protected function runHelp()
    {
        echo <<<HELP
Usage: php [options] FileRenamer.php [-s] <dir_path> [-r] <strategy> 
       php [options] FileRenamer.php [-s] <dir_path> [-r] <strategy> [-d] <dir_path> 
     
  -s <dir_path>  Path to the source directory which files should be renamed
  -d <dir_path>  Path to directory where renamed files should be saved
  -r <strategy>  Rename Strategy
  -l             List of registered Rename Strategies
  -h             Help


HELP;
    }
    
    /**
     * Displays list of registered Strategies 
     * 
     * @return void
     */
    protected function runStrategyList()
    {
        foreach($this->strategies  as $key => $value) {
            echo<<<STRATEGY
  <$key>   {$value['desc']}

STRATEGY;
        }
    }
    
    /**
     * Run Strategy
     * Displays process result
     * 
     * @return void
     * @throws GeneralException 
     */
    protected function runStrategy()
    {
        $strategy_class = isset($this->strategies[$this->options['r']]['class'])? $this->strategies[$this->options['r']]['class']: null;
        
        if(is_null($strategy_class) || !class_exists($strategy_class)) {
            throw new GeneralException('Error: Strategy "'.$strategy_class.'" has not found. Please use other strategy or correct configuration.');
        } 
        
        $source_path        = $this->options['s'];
        $destination_path   = (isset($this->options['d']))? $this->options['d']: null;
        
        // init
        $report     = new Report\Csv;
        $strategy   = new $strategy_class;
        $core       = new Core($source_path, $strategy, $report);

        // run
        $process_date = date(self::DATA_TIME);
        echo <<<MESSAGE
==== FileRenamer ====
  Process begin at $process_date

MESSAGE;

        $core->setDestinationPath($destination_path)->run();

        $process_date = date(self::DATA_TIME);
        echo <<<MESSAGE
  Process finished at $process_date
  Please open report for more details {$report->getReportPath()}
=====================


MESSAGE;
    }
}
