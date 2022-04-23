<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlEnum
{
    const emmatel_samsung = "http://emma.sourcecode-ai.com/api/products/mobile/18";
    const emmatel_xiaomi ='http://emma.sourcecode-ai.com/api/products/mobile/19';
    const emmatel_infinix ='http://emma.sourcecode-ai.com/api/products/mobile/21';
    const emmatel_apple = 'http://emma.sourcecode-ai.com/api/products/mobile/17';
    const emmatel_tecno = 'http://emma.sourcecode-ai.com/api/products/mobile/31';
    const emmatel_nokia = 'http://emma.sourcecode-ai.com/api/products/mobile/30';
    const emmatel_realme = 'http://emma.sourcecode-ai.com/api/products/mobile/22';
    const emmatel_oneplus = 'http://emma.sourcecode-ai.com/api/products/mobile/25';
    const emmatel_oppo = 'http://emma.sourcecode-ai.com/api/products/mobile/24';
    const emmatel_samsung_tab = 'http://emma.sourcecode-ai.com/api/products/tab/18';
    const emmatel_apple_tab = 'http://emma.sourcecode-ai.com/api/products/tab/17';

    const samatel='http://mobapp.samatel.sy/appApi/api/Items/Filter';

    const mabco_mob='mabco.sy:8088/service1.svc/GetStockByBrandCodeAndCatCode/00';
    const mabco_tab='mabco.sy:8088/service1.svc/GetStockByBrandCodeAndCatCode/09';
    const mabco_accessory='mabco.sy:8088/service1.svc/GetStockByBrandCodeAndCatCode/01';
}
