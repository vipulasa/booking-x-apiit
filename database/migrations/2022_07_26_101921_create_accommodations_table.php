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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');

            $table->string('room_type');

            $table->string('occupancy')->nullable();

            $table->string('number_of_rooms')->nullable();

            $table->string('room_size')->nullable();

            $table->string('room_view')->nullable();

            $table->smallInteger('beds')->default(1)->nullable();

            $table->smallInteger('bathrooms')->default(1)->nullable();

            $table->json('features')->nullable();

            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('accommodations');
    }
};
