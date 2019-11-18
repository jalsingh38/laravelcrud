<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('location');
            $table->string('address');
            $table->string('overview_title');
            $table->text('overview_detail');
            $table->integer('max_participants');
            $table->integer('days');
            $table->string('primary_langauge');
            $table->string('accommodation');
            $table->time('check_in');
            $table->time('check_out');
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
        Schema::dropIfExists('trainings');
    }
}
