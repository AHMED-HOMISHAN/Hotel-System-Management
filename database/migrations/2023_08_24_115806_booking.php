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
        Schema::create('bookings',function(Blueprint $table){
            $table->increments('id');
            $table->integer('roomNumber')->unsigned();
            $table->integer('staffName')->unsigned();;
            $table->string('personalName');
            $table->integer('totalMembers');
            $table->date('arrivalDate');
            $table->date('depatureDate');
            $table->string('email');
            $table->string('phoneNumber');
            $table->longText('message')->nullable();
            $table->string('image');
            $table->boolean('paied');
            $table->foreign('roomNumber')->references('id')->on('rooms');
            $table->foreign('staffName')->references('id')->on('staffs');
            $table->enum('Status',['1','0'])->default('1');
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
