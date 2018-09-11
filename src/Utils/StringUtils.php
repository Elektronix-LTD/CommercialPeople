<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 10.09.2018
 * Time: 01:13
 */

namespace App\Utils;


class StringUtils
{
    public static function generateRandomText(int $length=12)
    {
        $randomText = '';
        for ($i=0; $i<$length; $i++){
            $rangeWidth = Ord('Z')-Ord('A');
            $x = rand(0, $rangeWidth);
            $randomText .= range('A','Z')[$x];
        }
        return $randomText;
    }

}