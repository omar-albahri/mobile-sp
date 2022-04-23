<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile_price extends Model
{
    use HasFactory;
//    public $table = 'mobile_prices';
    protected $table  = 'mobile_prices';
    protected $fillable = [
        'category',
        'mobile_name',
        'price',
        'currency',
        'lang',
        'image',
        'num',
        'link',
        'type',
        'market_id',
        'available'
    ];

    public function Market(){
        return $this->belongsTo(Market::class);
    }

}
