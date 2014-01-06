<?php
/**
 * Translit Hungarian
 * Rename strategy based on replace Hungarian to Latin characters
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy\Translit;

class Hungarian extends \FileRenamer\Strategy\StrReplace
{    
    protected $replace_pair = array(
        'Á' => 'A', 'á' => 'a', 'É' => 'E', 'é' => 'e',
        'Í' => 'I', 'í' => 'i', 'Ó' => 'O', 'ó' => 'o',
        'Ö' => 'O', 'ö' => 'o', 'Ő' => 'O', 'ő' => 'o',
        'Ú' => 'U', 'ú' => 'u', 'Ü' => 'U', 'ü' => 'u', 
        'Ű' => 'U', 'ű' => 'u'
    );
}
