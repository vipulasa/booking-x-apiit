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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('hotel_id')->unsigned()->nullable();

            $table->foreign('hotel_id')->references('id')->on('hotels');

            $table->string('title');

            $table->text('description')->nullable();

            $table->float('price_fixed', 10, 2)->nullable();

            $table->float('price_per_person', 10, 2)->nullable();

            $table->float('price_perday', 10, 2)->nullable();

            $table->integer('occupancy')->default(1);

            $table->enum('nationality', [
                'local',
                'forign'
            ]);

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
        Schema::dropIfExists('packages');
    }
};
