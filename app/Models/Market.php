<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $table  = 'markets';
    protected $fillable = [
        'name',
    ];

    public function Mobile_price(){
        return $this->hasMany(Mobile_price::class, 'market_id');
    }

}
