<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandEnum
{
    //7/9/13/20
    const Huawei=7;
    const Xiaomi=9;
    const Realme=20;
    const Oppo=13;


    public static function Labels(){
        return [
            self::Huawei => "Huawei",
            self::Xiaomi => "Xiaomi",
            self::Realme => "Realme",
            self::Oppo => "Oppo",
        ];
    }
}
