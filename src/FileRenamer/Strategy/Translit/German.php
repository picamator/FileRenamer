<?php
/**
 * Translit German
 * Rename strategy based on replace German umlaut to Latin characters
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy\Translit;

class German extends \FileRenamer\Strategy\StrReplace
{    
    protected $replace_pair = array(
        'Ä' => 'Ae', 'ä' => 'ae', 'Ö' => 'Oe', 
        'ö' => 'oe', 'Ü' => 'Ue', 'ü' => 'ue',
        'ß' => 'ss'
    );
}
