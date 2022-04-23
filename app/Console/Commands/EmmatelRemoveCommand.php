<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mobile_price;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\UrlEnum;

class EmmatelRemoveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  //  protected $signature = 'emmatel_price {category}';
    protected $signature = 'emmatel_price';

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
    public function handle()
    {
       // $category = $this->argument('category');
     //   $response = Http::withHeaders(['lang'=>'en'])->retry(3, 1000)->get('http://emma.sourcecode-ai.com/api/products/tab/'.$category);
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
  //      $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_samsung_tab),
    //    $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_apple_tab),
              ]);
        Mobile_price::truncate();
    foreach ($response as $item) {
            $data1 = $item->json();
            $mobile = $data1['products'];
            foreach ($mobile as $one) {
                //create
                $model = Mobile_price::create([
                    'num' => $one['id'],
                    'category' => $one['category'],
                    'mobile_name' => $one['name'],
                    'price' => $one['price'],
                    'link' => $one['category_id'],
                    'available'=>true,
                    'type'=>'mobile',
                    'market_id'=>1,
                    /* 'image' => $request->file('image')->store('mobile_apis/sss'),
                    */
                ]);
            }
        }
        $response2 = Http::pool(fn(Pool $pool)=>[
        $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_samsung_tab),
        $pool->withHeaders(["lang"=>"en"])->get(UrlEnum::emmatel_apple_tab),
          ]);
        foreach ($response2 as $item2) {
            $data2 = $item2->json();
            $tab = $data2['products'];
            foreach ($tab as $one) {
                //create
                $model = Mobile_price::create([
                    'num' => $one['id'],
                    'category' => $one['category'],
                    'mobile_name' => $one['name'],
                    'price' => $one['price'],
                    'link' => $one['category_id'],
                    'available'=>true,
                    'type'=>'tab',
                    'market_id'=>1,
                    /* 'image' => $request->file('image')->store('mobile_apis/sss'),
                    */
                ]);
            }
        }
    }
}





