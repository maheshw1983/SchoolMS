<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->longText('detailed_description');
            $table->string('venue');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->string('from_grade');
            $table->string('to_grade');
            $table->integer('user_id')->unsigned(); //Teacher in Charge
            $table->string('image')->default('default.png');
            $table->double('act_income');
            $table->double('act_expense');
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
        Schema::dropIfExists('events');
    }
}
