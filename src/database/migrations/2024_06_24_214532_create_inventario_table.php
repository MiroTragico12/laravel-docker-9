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
            $table->string('nomeItem');
            $table->double('valor');
            $table->unsignedBigInteger('explorador_id');
            $table->unsignedBigInteger('localizacao_id');
            $table->double('longitude',10,6);
            $table->double('latitude',10,6);

            $table->foreignId('explorador_id')->references('id')->on('explorador')->onDelete('cascade');
            $table->foreignId('localizacao_id')->references('id')->on('localizacao')->onDelete('set null');
            
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
