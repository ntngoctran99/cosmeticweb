<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->string('payment');
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:unpaid|1:paid');
            $table->string('fullname');
            $table->string('address');
            $table->string('phone_number',20);
            $table->unsignedBigInteger('staff_id')->unsigned();
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table){
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
