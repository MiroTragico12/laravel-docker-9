<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trocas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('explorador1_id');
            $table->unsignedBigInteger('explorador2_id');
            $table->unsignedBigInteger('item1_id');
            $table->unsignedBigInteger('item2_id');

            $table->foreign('explorador1_id')->references('id')->on('exploradors')->onDelete('cascade');
            $table->foreign('explorador2_id')->references('id')->on('exploradors')->onDelete('cascade');
            $table->foreign('item1_id')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item2_id')->references('id')->on('itens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trocas');
    }
};
