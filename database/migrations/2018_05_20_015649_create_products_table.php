<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sku')->unique();
            $table->integer('category')->unsigned();
            $table->string('file')->nullable();
            $table->text('desc')->nullable();
            $table->string('specific')->nullable();
            $table->string('tags')->nullable();
            $table->string('brend')->nullable();
            $table->string('country')->nullable();
            $table->string('model')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->float('price1');
            $table->float('price2');
            $table->float('price3');
            $table->string('available')->nullable();
            $table->float('count');
            $table->float('count_reserve');
            $table->string('piece_size')->nullable();
            $table->float('piece_weight');
            $table->string('pack_size')->nullable();
            $table->float('pack_weight');
            $table->string('box_size')->nullable();
            $table->float('box_weight');
            $table->float('count_in_box');
            $table->float('count_in_pack');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
