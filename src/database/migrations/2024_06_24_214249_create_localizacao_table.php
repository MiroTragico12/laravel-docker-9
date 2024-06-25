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
        Schema::create('localizacao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedBigInteger('explorador_id');

            $table->foreign('explorador_id')->references('id')->on('explorador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacao');
    }
};
