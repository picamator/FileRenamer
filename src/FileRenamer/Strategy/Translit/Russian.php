<?php
/**
 * Translit Russian
 * Rename strategy based on transliteration Russian to Latin
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy\Translit;

class Russian extends \FileRenamer\Strategy\StrReplace
{    
     protected $replace_pair = array(
        'а' => 'a',  'б' => 'b',  'в' => 'v',   'г' => 'g', 'д' => 'd', 'e' => 'e',
        'ё' => 'io', 'ж' => 'zh', 'з' => 'z',   'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l',  'м' => 'm',  'н' => 'n',   'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's',  'т' => 't',  'у' => 'u',   'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sht', 'ъ' => 'a', 'ы' => 'i', 'ь' => 'y',
        'э' => 'e',  'ю' => 'yu', 'я' => 'ya',
         
        'А' => 'A',  'Б' => 'B',  'В' => 'V',   'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'Io', 'Ж' => 'Zh', 'З' => 'Z',   'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L',  'М' => 'M',  'Н' => 'N',   'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S',  'Т' => 'T',  'У' => 'U',   'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Tz',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sht', 'Ъ' => 'A', 'Ы' => 'I', 'Ь' => 'Y', 
        'Э' => 'E',  'Ю' => 'Yu', 'Я' => 'Ya'
    );
}
