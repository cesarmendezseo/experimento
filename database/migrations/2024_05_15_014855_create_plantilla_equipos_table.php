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
        Schema::create('plantilla_equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jugador_id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('torneo_id');
            $table->string('activo')->default(null);
            $table->timestamps();

            $table->foreign('jugador_id')->references('id')->on('jugadores');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('torneo_id')->references('id')->on('torneos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantilla_equipos');
    }
};
