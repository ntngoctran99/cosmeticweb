<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email',20)->index();
            $table->string('token');
            $table->char('code_security',4);
            $table->tinyInteger('used')->default(0)->comment('	0:new|1:used');
            $table->tinyInteger('active')->default(1)->comment('0:Inactive|1:Active');
            $table->tinyInteger('del_flag')->default(0)->comment('0:Undel|1:Del');
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
        Schema::dropIfExists('password_resets');
    }
}
