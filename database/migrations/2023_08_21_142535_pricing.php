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
       Schema::create('pricing', function (Blueprint $table) {
           $table->increments('id');
           $table->enum('roomType',['Single','Double','Quad','King','Suite','Villa']);
           $table->decimal('price');
           $table->enum('freeBreakfast',['1','0'])->default('0');
           $table->enum('freeWifi',['1','0'])->default('0');
           $table->enum('airConditioning',['1','0'])->default('0');
           $table->enum('laundry',['1','0'])->default('0');
           $table->enum('Parking',['1','0'])->default('0');
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
