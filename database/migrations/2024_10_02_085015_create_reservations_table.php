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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ownerNameReservation');
            $table->string('ownerSurnameReservation');
            $table->integer('TotalPeople');

            $table->string('Experience');

            $table->unsignedBigInteger('experience_id')->nullable();
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('set null');

            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
