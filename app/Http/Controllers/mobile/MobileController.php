<?php

namespace App\Http\Controllers\mobile;

use App\Models\Mobile_price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print_all()
    {
        $models=Mobile_price::all()->where('available','=',true);
        foreach ($models as $one){
            echo $one['category']." ".$one['mobile_name']." : ".$one['price'];
            echo "<br>";
         }
    }
    public function print_emmatel()
    {
        $models=Mobile_price::all()->where('market_id','=',1)->where('available','=',true);
        foreach ($models as $one){
            echo $one['category']." ".$one['mobile_name']." : ".$one['price'];
            echo "<br>";
         }
    }
    public function print_samatel()
    {
        $models=Mobile_price::all()->where('market_id','=',2)->where('available','=',true)->sortBy(['category','price']);
        foreach ($models as $one){
            echo $one['category']." ".$one['mobile_name']." : ".$one['price'];
            echo "<br>";
         }
    }
    public function print_mabco()
    {
        $models=Mobile_price::all()->where('market_id','=',3)->where('available','=',true)->sortBy('mobile_name');
        foreach ($models as $one){
            echo $one['mobile_name']." : ".$one['price'];
            echo "<br>";
         }
    }
    public function index()
    {
        $models2 = Mobile_price::where('available','=',true)->groupBy('category')->select('category')->get();

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
                    ->paginate(12)->setPath(route('index'));
            }else{
                $models = Mobile_price::where('market_id', '=', $market)
                    ->where('available','=',true)
                    ->paginate(12)->setPath(route('index'));
            }
        }elseif ($category){
            $models = Mobile_price::where('available','=',true)
                ->where('category','=',$category)
                ->paginate(12)->setPath(route('index'));
        }
        else {
            $models = Mobile_price::where('available','=',true)
                ->paginate(12)->setPath(route('index'));
        }
        return view('front.home', [
            'models' => $models
              ,
            'models2' => $models2
        ]);
    }

    public function getcategery(){
        $market = '';
        if(isset($_GET['market'])){
            $market = $_GET['market'];
        }
        if($market){
            $models2 = Mobile_price::where('available','=',true)->where('market_id', '=', $market)->groupBy('category')->select('category')->get();
        } else {
            $models2 = Mobile_price::where('available','=',true)->groupBy('category')->select('category')->get();
        }
        return view('front.tab_category', [
            'models2' => $models2
        ]);
    }

    public function product()
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
                    ->paginate(12)->setPath(route('index'));
            }else{
            $models = Mobile_price::where('market_id', '=', $market)
                ->where('available','=',true)
                ->paginate(12)->setPath(route('index'));
            }
        }elseif ($category){
            $models = Mobile_price::where('available','=',true)
                ->where('category','=',$category)
                ->paginate(12)->setPath(route('index'));
        }
        else {
            $models = Mobile_price::where('available','=',true)
                ->paginate(12)->setPath(route('index'));
        }
//        $models->setPath(Route::getCurrentRoute()->getpath().'?market='.$market.'&&category='.$category);

        return view('front.product', [
            'models' => $models
//                ->appends($market,$category)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mobile_api.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Mobile_price::create([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $request->file('image')->store('mobile_apis/sss'),
        ]);
        return redirect(route('backend.mobile_api.show', $model));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mobile_api  $mobile_api
     * @return \Illuminate\Http\Response
     */
    public function show(Mobile_price $Emmatel_price)
    {
        //
        $model = Mobile_price::find($Emmatel_price->id);
        return view('backend.mobile_api.show', [
            'model' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mobile_api  $mobile_api
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobile_price $Emmatel_price)
    {
        return view('backend.mobile_api.edit', [
            'model' => $Emmatel_price,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobile_price  $Emmatel_price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobile_price $Emmatel_price)
    {
//        $Emmatel_price->ar_name = $request->ar_name;
//        $Emmatel_price->en_name = $request->en_name;
        $Emmatel_price->price = $request->price ? $request->price: $Emmatel_price->price;
        $Emmatel_price->available=$request->available;
//        $Emmatel_price->image = $request->file('image')->store('mobile_apis/sss');
        $Emmatel_price->save();
        return redirect(route('backend.mobile_api.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobile_price  $Emmatel_price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobile_price $Emmatel_price)
    {

    }
//
//    public function test(){
//        $response = Http::withHeaders(['lang'=>'en'])->get('http://emma.sourcecode-ai.com/api/products/tab/17');
//        $data1=$response->json();
//        $mobile=$data1['products'];
//        Mobile_price::truncate();
//        foreach ($mobile as $one){
//                    //create
//                    $model = Mobile_price::create([
//                        'num' => $one['id'],
//                        'category' => $one['category'],
//                        'mobile_name' => $one['name'],
//                        'price' => $one['price'],
//                        /* 'image' => $request->file('image')->store('mobile_apis/sss'),
//                        */
//                    ]);
//                    //return redirect(route('backend.mobile_api.show', $model));
//        }
//    }
}



