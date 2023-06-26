<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class market extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('markets')->count()==0){
            echo 'ddd';
            DB::table('markets')->insert([
                [
                    'id'=>1,
                    'name'=>'emmatel'
                ],
                [
                    'id'=>2,
                    'name'=>'samatel'
                ],
                [
                    'id'=>3,
                    'name'=>'mabco'
                ]
            ]);
        }else{
            echo 'table is not empty';
        }
    }
}
