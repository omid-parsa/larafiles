<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
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
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('plan_id');
            $table->string('plan_title',250);
            $table->integer('plan_limit_download_count');
            $table->integer('plan_price');
            $table->integer('plan_days_count');
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
        Schema::dropIfExists('plans');
    }
}
