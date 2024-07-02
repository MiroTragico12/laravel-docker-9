<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('explorador_id');

            $table->foreign('explorador_id')->references('id')->on('exploradors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
};
