<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('mode')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('car_category')->nullable();
            $table->string('pick_location')->nullable();
            $table->string('pickup_latitude')->nullable();
            $table->string('pickup_longitude')->nullable();
            $table->string('drop_location')->nullable();
            $table->string('dropoff_latitude')->nullable();
            $table->string('dropoff_longitude')->nullable();
            $table->string('distance')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('driver')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
