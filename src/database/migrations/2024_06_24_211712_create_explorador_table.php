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
        Schema::create('explorador', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade');
            $table->unsignedBigInteger('localizacao_id');
            $table->unsignedBigInteger('inventario_id');
            $table->timestamps();

            $table->foreignId('inventario_id')->references('id')->on('inventario')->onDelete('cascade');
            $table->foreignId('localizacao_id')->references('id')->on('localizacao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explorador');
    }
};
