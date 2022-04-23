<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mobile_price;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\UrlEnum;
use App\Enums\MabcoCatEnum;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\UploadedFile;

use App\Console\Commands\Helpfunction;

class MabcoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'mabco';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mabco price description';

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

    public function handle()
    {

        $response = Http::retry(100,3)->get(UrlEnum::mabco_mob);
        $mobiles = Mobile_price::where('market_id', '=', '3')->where('type', 'like', 'mobile')->get();
        $old_mobile_ids = [];
        foreach ($mobiles as $one) {
            $old_mobile_ids[] = $one->num;
        }
        $to_be_stored = [];

        $data1 = $response->json();
        $item = $data1['GetStockByBrandCodeAndCatCodeResult'];
        foreach ($item as $many) {
            foreach ($many as $one) {
                if (in_array(intval($one['stk_code']), $old_mobile_ids)) {
                    $to_be_stored[] = intval($one['stk_code']);
                    $mob = Mobile_price::where('market_id', '=', '3')->where('num', 'like', intval($one['stk_code']))->where('type', 'like', 'mobile')->first();
                    if ($mob) {
                        //we need to update avaiable to false
                        $mob['price'] = $one['shelf_price'];
                        $mob['available'] = true;
                        $mob->save();
                     //   echo $mob;
                    }
                } else {
                    $mob = Mobile_price::where('market_id', '=', '3')->where('num', 'like', intval($one['stk_code']))->first();
                    if (!$mob) {
                      //  echo $mob;
                        $url_img = 'http://'.$one['image_link'];
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

                        $mob = Mobile_price::create([
                            'num' => intval($one['stk_code']),
                            'category' => MabcoCatEnum::cat($one['brand_code']),
                            'mobile_name' => $one['stk_desc'],
                            'price' => $one['shelf_price'],
                            'link' => $one['brand_code'],
                            'image'=>$name,
                            'available' => true,
                            'type' => 'mobile',
                            'market_id' => 3,
                        ]);
                    }
                }
            }
        }
        foreach ($old_mobile_ids as $oneId) {
            // echo $one;
            if (!in_array($oneId, $to_be_stored)) {
                $mob = Mobile_price::where('market_id', '=', '3')->where('num', 'like', $oneId)->first();
                if ($mob) {
                    //we need to update avaiable to false
                    $mob['available'] = false;
                    $mob->save();
                    echo $mob;
                }
            }
        }
    }
}





