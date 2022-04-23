<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MabcoCatEnum
{
    //7/9/13/20

    const Xiaomi=73;
    const Samsung=17;
    const Nokia=00;
    const Realme=76;
    const Oppo=77;
    const Infinix=78;
    const Tecno=79;

    public static function cat($num){
        switch ($num){
            case 73: return "Xiaomi";
            case 17: return "Samsung";
            case 00: return "Nokia";
            case 76: return "Realme";
            case 77: return "Oppo";
            case 78: return "Infinix";
            case 79: return "Tecno";
        }

    }
    public static function Labels(){
        return [
            self::Xiaomi => "Xiaomi",
            self::Samsung => "Samsung",
            self::Nokia => "Nokia",
            self::Realme => "Realme",
            self::Oppo => "Oppo",
            self::Infinix => "Infinix",
            self::Tecno => "Tecno",
        ];
    }
}
