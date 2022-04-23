<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table  = 'blogs';
    protected $fillable = [
        'title',
        'meta',
        'body',
    ];

//    public function Mobile_price(){
//
//        return $this->hasMany(Mobile_price::class, 'market_id');
//    }
    public function Blog_image(){
        return $this->hasMany(Blog::class,'blog_id');
    }

}
