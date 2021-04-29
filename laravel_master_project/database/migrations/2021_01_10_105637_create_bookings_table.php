<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id'); 
            $table->integer('provider_id'); 
            $table->text("is_taken");
    
            $table->string('service_location'); 
            $table->string('service_name'); 
            $table->string('provider_phone'); 
            $table->string('service_price'); 
            $table->string('provider_name'); 
            $table->integer('service_id')->references('id')->on('services')->onDelete('cascade');; 
            $table->integer('avalability_id'); 
            $table->string('status');
            $table->string("notes");
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
        Schema::dropIfExists('bookings');
    }
}
