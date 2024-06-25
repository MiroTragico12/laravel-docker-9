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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('explorador_id');
            $table->unsignedBigInteger('item_id');
            

            $table->foreignId('explorador_id')->references('id')->on('explorador')->onDelete('cascade');
            $table->foreignId('item_id')->references('id')->on('item')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
