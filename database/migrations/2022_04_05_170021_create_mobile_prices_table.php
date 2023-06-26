<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//'category',
//'mobile_name',
//'price',
//'lang',
//'image',
//'num',
//'link',
//'type',
//'market_id',
//'available'
    public function up()
    {
        Schema::create('mobile_prices', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('mobile_name');
            $table->string('price')->nullable();
            $table->string('currency')->default(" ل.س ");
            $table->string('image')->nullable();
            $table->bigInteger('num')->nullable();
            $table->string('link');
            $table->string('type')->nullable();
            $table->boolean('available')->default(true);
            $table->bigInteger('market_id')->unsigned();
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade')->onUpdate('cascade');
//            $table->primary(['market_id','num']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_prices');
    }
}
