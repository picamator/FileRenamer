<?php
/**
 * Strategy Replace Russian
 * Rename strategy based transliteration Ukrainian to Latin
 *  
 * @link        https://github.com/picamator/FileRenamer
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace FileRenamer\Strategy\Replace;

class Ukrainian extends StrReplace
{    
     protected $replace_pair = array(
        'а' => 'a',  'б' => 'b',  'в' => 'w',  'г' => 'h',  'ґ' => 'g',  'д' => 'd',  
        'e' => 'e',  'є' => 'ye', 'ж' => 'zh', 'з' => 'z',  'и' => 'y',  'і' => 'i',  
        'ї' => 'yi', 'й' => 'j',  'к' => 'k',  'л' => 'l',  'м' => 'm',  'н' => 'n',    
        'о' => 'o',  'п' => 'p',  'р' => 'r',  'с' => 's',  'т' => 't',  'у' => 'u',  
        'ф' => 'f',  'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
        'ь' => '',   'ю' => 'yu', 'я' => 'ya',
         
        'А' => 'A',  'Б' => 'B',  'В' => 'V',  'Г' => 'G',  'Ґ' => 'G',  'Д' => 'D',
        'Е' => 'E',  'Є' => 'Ye', 'Ж' => 'Zh', 'З' => 'Z',  'И' => 'Y',  'І' => 'I',  
        'Ї' => 'Yi', 'Й' => 'J',  'К' => 'K',  'Л' => 'L',  'М' => 'M',  'Н' => 'N',
        'О' => 'O',  'П' => 'P',  'Р' => 'R',  'С' => 'S',  'Т' => 'T',  'У' => 'U',
        'Ф' => 'F',  'Х' => 'Kh', 'Ц' => 'Tz', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Shch', 
        'Ь' => '',   'Ю' => 'Yu', 'Я' => 'Ya',
         
        '’' => ''
    );
}
