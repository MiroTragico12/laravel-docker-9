<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->double('valor', 10, 2);
            $table->unsignedBigInteger('inventario_id');
            $table->unsignedBigInteger('localizacao_id');
            $table->unsignedBigInteger('explorador_id');

            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');
            $table->foreign('localizacao_id')->references('id')->on('localizacoes')->onDelete('cascade');
            $table->foreign('explorador_id')->references('id')->on('exploradors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens');
    }
};
