<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middleinitial')->nullable();
            $table->string('school_id')->unique();
            $table->string('user_type');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('location_id')->default('1');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->double('rate')->default('0');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
