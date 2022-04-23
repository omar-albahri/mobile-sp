<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Mobile_price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{
    public function index()
    {
        $models = Blog::all();

        return view('front.blog_list', [
            'models' => $models
        ]);
    }

}