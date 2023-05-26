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
        Schema::create('imovels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idDono');
            $table->foreign('idDono')->references('id')->on('users');
            $table->string('titulo',50);
            $table->integer('val_diaria');
            $table->string('CEP', 9);
            $table->text('descricao');
            $table->string('caracteristicas',100);
            $table->integer('max_pessoas');
            $table->integer('min_dias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imovels');
    }
};
