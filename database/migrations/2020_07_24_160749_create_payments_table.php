<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('payment_user_id')->index();
            $table->smallInteger('payment_method');
            $table->string('payment_gateway_name');
            $table->string('payment_res_num');
            $table->string('payment_ref_id');
            $table->integer('payment_amount');
            $table->timestamps();
            $table->smallInteger('status')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
