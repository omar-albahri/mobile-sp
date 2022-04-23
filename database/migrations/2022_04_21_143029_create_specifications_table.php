<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('num')->nullable();
            $table->integer('market_id')->nullable();
            $table->string('camera')->nullable();
            $table->string('ram')->nullable();
            $table->string('memory')->nullable();
            $table->string('screen')->nullable();
            $table->string('battery')->nullable();
            $table->string('os')->nullable();
            $table->string('cpu')->nullable();
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->foreign(['market_id','num'])->references(['market_id','num'])->on('markets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('specifications');
    }
}
