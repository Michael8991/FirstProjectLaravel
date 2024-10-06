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
        Schema::create('completed_form', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DNI', 9);
            $table->string('Name');
            $table->string('Surname');

            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');

            $table->longText('LegalText')->nullable();
            $table->json('fields')->nullable();

            $table->boolean('signature');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completed_form');
    }
};
