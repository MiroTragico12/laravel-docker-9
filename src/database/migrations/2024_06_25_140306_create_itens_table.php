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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->double('valor',10,2);
            $table->unsignedBigInteger('inventario_id');
            $table->unsignedBigInteger('localizacao_id');
            $table->unsignedBigInteger('explorador_id');
          
            $table->foreignId('explorador_id')->references('id')->on('explorador')->onDelete('cascade');
            $table->foreignId('inventario_id')->references('id')->on('inventario')->onDelete('cascade');
            $table->foreignId('localizacao_id')->references('id')->on('localizacao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
