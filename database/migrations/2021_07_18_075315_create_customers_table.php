<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone_number',20);
            $table->tinyInteger('gender')->default(0)->comment('0:male|1:female');
            $table->timestamp('birthday')->nullable();
            $table->string('address');
            $table->string('email');
            $table->unsignedBigInteger('user_id')->unique()->index();
            $table->timestamps();
        });

        Schema::table('customers', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
