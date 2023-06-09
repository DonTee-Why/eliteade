<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('min_price')->nullable();
            $table->string('d_acct_manager')->nullable();
            $table->string('training')->nullable();
            $table->integer('max_price')->nullable();
            $table->string('minr')->nullable();
            $table->string('maxr')->nullable();
            $table->string('gift')->nullable();
            $table->string('expected_return')->nullable();
            $table->string('type')->nullable();
            $table->string('increment_interval')->nullable();
            $table->string('increment_type')->nullable();
            $table->integer('increment_amount')->nullable();
            $table->string('expiration')->nullable();
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
