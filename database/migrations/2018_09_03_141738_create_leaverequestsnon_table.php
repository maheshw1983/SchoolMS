<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaverequestsnonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaverequestsnon', function (Blueprint $table) {
            $table->increments('leaveid');
            $table->string('staffid');
            $table->string('fullname');
            $table->string('profession');
            $table->string('department');
            $table->date('from');
            $table->date('to');
            $table->string('type');
            $table->string('reason');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('leaverequestsnon');
    }
}
