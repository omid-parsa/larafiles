<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscibersTable extends Migration
{
    // to create a model with its migration (migration is used to create a related table in database)->
    //<- use this command in cmd 'php artisan make:model Models/package -m' ** -m is used to create a migration automatically
    // package is just an name for model and table
    // to run migrate 'php artisan migrate'
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('subscribe_id');
            $table->integer('subscribe_user_id')->index();
            $table->integer('subscribe_plan_id')->index();
            $table->integer('subscribe_download_limit');
            $table->integer('subscribe_download_count');
            $table->integer('subscribe_payment_amount');
            $table->dateTime('subscribe_created_at')->index();
            $table->dateTime('subscribe_expire_at')->index();
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
        Schema::dropIfExists('subscribers');
    }
}
