<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {

            $table->string('staffid');
            $table->integer('roleid');
            $table->string('fullname');
            $table->string('dob');
            $table->string('gender');
            $table->string('nic');
            $table->mediumText('paddress');
            $table->mediumText('caddress');
            $table->string('contact');
            $table->string('email');
            $table->string('profession');
            $table->text('qualifications');
            $table->integer('experience');
            $table->string('department');
            $table->integer('leavebalance');
            $table->string('username');
            $table->string('passsword');
            $table->string('confirmpassword');
            $table->string('regdate');
            $table->timestamps();

            $table->primary('staffid');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academics');
    }
}
