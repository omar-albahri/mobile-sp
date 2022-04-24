<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mobile_price;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\UrlEnum;
use App\Enums\BrandEnum;
use Illuminate\Support\Facades\Storage;

class SamatelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'samatel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'samatel price description';

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
       // $category = $this->argument('category');

    foreach (BrandEnum::Labels() as $link=>$category) {

        $response = Http::post(UrlEnum::samatel,
            [
                //7/9/13/20
                //7 for hawaii
                "BrandId"=>$link,
                "CategoryId"=>1,
                "Page"=>1,
                "PageLength"=>1000,
                "PageNum"=>1
            ]);

        $mobiles=Mobile_price::where('market_id', '=', '2')->where('type','like','mobile')->where('category','like',$category)->get();
        $old_mobile_ids = [];
        foreach ($mobiles as $one){
            $old_mobile_ids[] = $one->num;
        }
        $to_be_stored = [];
//        foreach ($response as $products){
  //          $data1 = $products->json();
            $data1 = $response->json();
            $item = $data1['Items'];
            foreach ($item as $one) {
                if(in_array($one['Id'], $old_mobile_ids)){
                    $to_be_stored[] = $one['Id'];
                    $mob = Mobile_price::where('market_id', '=', '2')->where('num','like',$one['Id'])->where('type','like','mobile')->where('category','like',$category)->first();
                    if($mob){
                        //we need to update avaiable to false
                        $mob['price']=$one['Price'];
                        $mob['available'] =true;
                        $mob->save();
                        echo $mob;
                    }
                }else{
                    // i think must be test because find is not very corecet and must add parameter
//                    $mob = Mobile_price::where('market_id', '=', '2')->find($one['Id']);
                    $mob = Mobile_price::where('market_id', '=', '2')->where('num','like',$one['Id'])->first();
                    if(!$mob){
                        echo $mob;
                        //bug
                        // here must check file_get_contents if file does not exist
                        $contents = file_get_contents($one['ImageUrl']);
                        $name = substr($one['ImageUrl'], strrpos($one['ImageUrl'], '/') + 1);
                        Storage::put($name, $contents);
                        $mob  = Mobile_price::create([
                            'num' => $one['Id'],
                            //'category' => $one['category'],
                            'category' => $category,
                            'mobile_name' => $one['Name'],
                            'price' => $one['Price'],
                            'link' => $link,
                            'image'=>$name,
                            'available'=>true,
                            'type'=>'mobile',
                            'market_id'=>2,
                        ]);
                    }
                }
            }
  //      }
        foreach ($old_mobile_ids as $one) {
            // echo $one;
            if(!in_array($one, $to_be_stored)){
                $mob = Mobile_price::where('market_id', '=', '2')->where('num','like',$one)->where('category','like',$category)->first();
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
}





