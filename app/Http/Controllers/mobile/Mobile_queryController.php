<?php

namespace App\Http\Controllers\mobile;

use App\Models\Mobile_price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class Mobile_queryController extends Controller
{
    public function index()
    {
        $market = '';
        if(isset($_GET['market'])){
            $market = $_GET['market'];
        }
        $category = '';
        if(isset($_GET['category'])){
            $category = $_GET['category'];
        }
        if($market){
            if($category){
                $models = Mobile_price::where('market_id', '=', $market)
                    ->where('available','=',true)
                    ->where('category','=',$category)
                    ->paginate(12);
            }else{
                $models = Mobile_price::where('market_id', '=', $market)
                    ->where('available','=',true)
                    ->paginate(12);
            }
        }elseif ($category){
            $models = Mobile_price::where('available','=',true)
                ->where('category','=',$category)
                ->paginate(12);
        }
        else {
            $models = Mobile_price::where('available','=',true)
                ->paginate(12);
        }
        return view('front.mobile_list', [
            'models' => $models
        ]);
    }

}