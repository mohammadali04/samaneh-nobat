<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Morilog\Jalali\Jalalian;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function exploadDateFormat($date){
        $date=explode('/',$date);
        return $date;
    }
    public static function getDateTimeJalali($date){
        $date=self::exploadDateFormat($date);
        $date=(new Jalalian($date[0],$date[1],$date[2]))->format('%A, %d %B %y');
        return $date;
    }
    public static function getDayId($date){
        $dayName=(new Jalalian($date[0],$date[1],$date[2]))->format('%A');
        switch( $dayName ){
            case 'شنبه': return 1;
            break;
            case 'یکشنبه': return 2;
            break;
            case 'دوشنبه': return 3;
            break;
            case 'سه‌شنبه': return 4;
            break;
            case 'چهارشنبه': return 5;
            break;
            case 'پنج‌شنبه': return 6;
            break;
            case 'جمعه': return 7;
        }
    }
}
