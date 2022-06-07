<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->string('name');
            $table->string('q_id');
            $table->string('q_id_Exp');
            $table->string('pp');
            $table->string('pp_exp');
            $table->string('q_id_img');
            $table->string('pp_img');
            $table->string('user_img');
            $table->string('service');
            $table->string('amount');
            $table->string('remark');
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
        Schema::dropIfExists('workers');
    }
}
