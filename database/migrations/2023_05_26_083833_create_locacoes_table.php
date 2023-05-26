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
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            //id_imovel
            $table->unsignedBigInteger('idImovel');
            $table->foreign('idImovel')->references('id')->on('imovels');
            //id_locador
            $table->unsignedBigInteger('idLocador');
            $table->foreign('idLocador')->references('idDono')->on('imovels');
            //id_locatario
            $table->unsignedBigInteger('idLocatario')->nullable();
            $table->foreign('idLocatario')->references('id')->on('users');
            $table->boolean('locado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacoes');
    }
};
