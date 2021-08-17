<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDeliveryReceivedNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_delivery_received_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_note_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->integer('quantity');
            $table->float('unit_price');
            $table->float('price');
            $table->primary(['detail_note_id','product_id']);
        });

        Schema::table('detail_delivery_received_notes', function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('detail_note_id')->references('id')->on('delivery_received_notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_delivery_received_notes');
    }
}
