<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryReceivedNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_received_notes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(2)->comment('1:Delivery | 2: Received');
            $table->unsignedBigInteger('supp_id');
            $table->unsignedBigInteger('staff_id');
            $table->timestamp('created_at');
        });

        Schema::table('delivery_received_notes', function (Blueprint $table){
            $table->foreign('supp_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_received_notes');
    }
}
