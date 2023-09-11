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
        Schema::create('rooms',function(Blueprint $table){
            $table->increments('id');
            $table->integer('roomType')->unsigned();
            $table->boolean('AC')->default(false);
            $table->string('Food');
            $table->integer('BedCount');
            $table->decimal('cancellation');
            $table->integer('PhoneNumber');
            $table->string('image');
            $table->enum('status',['0','1'])->default('1');
            $table->longText('message')->nullable();
            $table->foreign('roomType')->references('id')->on('pricing');
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
