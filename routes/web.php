<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use \App\Http\Controllers\mobile\MobileController;
use \App\Http\Controllers\mobile\Mobile_queryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//my custom Emmatel routes
Route::get('/mobile_api/update_data', function (){
    echo 'start';
    Artisan::call('emmatel');
    Artisan::call('samatel');
    Artisan::call('mabco');
    echo 'success';
});

Route::get('/mobile/product', [MobileController::class,'product']);
Route::get('/mobile/category', [MobileController::class,'getcategery']);

Route::get('/mobile_api/print', [MobileController::class,'print_all']);
Route::get('/mobile_api/print_emmatel', [MobileController::class,'print_emmatel']);
Route::get('/mobile_api/print_mabco', [MobileController::class,'print_mabco']);
Route::get('/mobile_api/print_samatel', [MobileController::class,'print_samatel']);
Route::resource('/', MobileController::class);

Route::resource('/mobile_list', Mobile_queryController::class);
Route::view('/about','front.about')->name('about');