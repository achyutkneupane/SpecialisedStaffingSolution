<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('job_description');
            $table->dateTime('job_startDateTime');
            $table->string('location');
            $table->enum('status',array('closed','completed','active','proposed','inactive'))->default('proposed');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('priority',array('0','1','2'))->default('0');
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
