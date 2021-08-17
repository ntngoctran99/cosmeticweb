<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('unit_price');
            $table->float('promotion_price')->nullable();
            $table->text('image');
            $table->string('unit');
            $table->integer('views');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table){
            $table->foreign('type_id')->references('id')->on('type_products')->onDelete('cascade');
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
