<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs',function(Blueprint $table){
            $table->increments('id');
            $table->string('userName')->nullable();
            $table->date('birthdate');
            $table->integer('phoneNumber');
            $table->enum('gender',['0','1']);
            $table->dateTime('joinedDate');
            $table->string('country');
            $table->string('address');
            $table->enum('role',['modern','Room Cleaner','Servants','Accountant','Reciptionalist'])->default('modern');
            $table->integer('user_id_fk')->unsigned();
            $table->foreign('user_id_fk')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
