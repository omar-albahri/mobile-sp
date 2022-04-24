<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mobile_price;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use App\Enums\UrlEnum;
use Illuminate\Support\Facades\Storage;
use App\Console\Commands\Helpfunction;


class EmmatelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'emmatel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'emmatel price description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public static function handle()
    {
            $response = Http::pool(fn(Pool $pool)=>[
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_samsung),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_xiaomi),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_apple),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_infinix),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_nokia),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_oneplus),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_oppo),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_realme),
                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_tecno),
//                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_samsung_tab),
//                $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_apple_tab),
            ]);
        $mobiles=Mobile_price::where('market_id', '=', '1')->where('type','like','mobile')->get();
        $old_mobile_ids = [];
        foreach ($mobiles as $one){
            $old_mobile_ids[] = $one->num;
        }
        $to_be_stored = [];
        foreach ($response as $products){
            $data1 = $products->json();
            $item = $data1['products'];
            foreach ($item as $one) {
                if(in_array($one['id'], $old_mobile_ids)){
                    $to_be_stored[] = $one['id'];
                    $mob = Mobile_price::where('num','like',$one['id'])->where('type','like','mobile')->first();
                    if($mob){
                        //we need to update avaiable to false
                        $mob['price']=preg_replace("/[^0-9]/","",$one['price']);
                        $mob['available'] =true;
                        $mob->save();
                        echo $mob;
                    }
                }else{
                $mob = Mobile_price::find($one['id']);
                if(!$mob){
                    echo $mob;
                    $url_img = 'https://emma.sourcecode-ai.com/storage/'.$one['image'];
                    $url_img = str_replace(' ', '', $url_img);
                    echo $url_img;
                    //bug
                    // here must check file_get_contents if file does not exist
                    if(Helpfunction::get_http_response_code($url_img) != "200"){
                        echo "error";
                        $name=null;
                    }else{
                        $contents = file_get_contents($url_img);
                        $name = substr($url_img, strrpos($url_img, '/') + 1);
                        Storage::put($name, $contents);
                    }

                    $mob  = Mobile_price::create([
                        'num' => $one['id'],
                        'category' => $one['category'],
                        'mobile_name' => $one['name'],
                        'price' => preg_replace("/[^0-9]/","",$one['price']),
                        'link' => $one['category_id'],
                        'image'=>$name,
                        'available'=>true,
                        'type'=>'mobile',
                        'market_id'=>1,
                    ]);
                }
                }
            }
        }
        foreach ($old_mobile_ids as $one) {
           // echo $one;
            if(!in_array($one, $to_be_stored)){
                $mob = Mobile_price::where('num','like',$one)->first();
                if($mob){
                    //we need to update avaiable to false
                    $mob['available'] =false;
                    $mob->save();
                    echo $mob;
                }
            }
        }
        // for tablet
    $response = Http::pool(fn(Pool $pool)=>[
        $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_samsung_tab),
        $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_apple_tab),
    ]);
        $mobiles=Mobile_price::where('market_id', '=', '1')->where('type','like','tab')->get();
        $old_mobile_ids = [];
        foreach ($mobiles as $one){
            $old_mobile_ids[] = $one->num;
        }
        $to_be_stored = [];
        foreach ($response as $products){
            $data1 = $products->json();
            $item = $data1['products'];
            foreach ($item as $one) {
                if(in_array($one['id'], $old_mobile_ids)){
                    $to_be_stored[] = $one['id'];
                    $mob = Mobile_price::where('num','like',$one['id'])->where('type','like','tab')->first();
                    if($mob){
                        //we need to update avaiable to false
                        $mob['price']=preg_replace("/[^0-9]/","",$one['price']);
                        $mob['available'] =true;
                        $mob->save();
                        echo $mob;
                    }
                }else{
                    $mob = Mobile_price::find($one['id']);
                    if(!$mob){
                        echo $mob;
                        echo $mob;
                        $url_img = 'https://emma.sourcecode-ai.com/storage/'.$one['image'];
                        $url_img = str_replace(' ', '', $url_img);
                        echo $url_img;
                        //bug
                        // here must check file_get_contents if file does not exist
                        if(Helpfunction::get_http_response_code($url_img) != "200"){
                            echo "error";
                            $name=null;
                        }else{
                            $contents = file_get_contents($url_img);
                            $name = substr($url_img, strrpos($url_img, '/') + 1);
                            Storage::put($name, $contents);
                        }
                        $mob  = Mobile_price::create([
                            'num' => $one['id'],
                            'category' => $one['category'],
                            'mobile_name' => $one['name'],
                            'price' => preg_replace("/[^0-9]/","",$one['price']),
                            'link' => $one['category_id'],
                            'image'=>$name,
                            'available'=>true,
                            'type'=>'tab',
                            'market_id'=>1,
                        ]);
                    }
                }
            }
        }
        foreach ($old_mobile_ids as $one) {
            // echo $one;
            if(!in_array($one, $to_be_stored)){
                $mob = Mobile_price::where('num','like',$one)->first();
                if($mob){
                    //we need to update avaiable to false
                    $mob['available'] =false;
                    $mob->save();
                    echo $mob;
                }
            }
        }
    }
}





