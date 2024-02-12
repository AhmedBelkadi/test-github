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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')->references('id')->on('salles')->onDelete('cascade');
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->unsignedBigInteger('id_element');
            $table->foreign('id_element')->references('id')->on('elements')->onDelete('cascade');
            $table->unsignedBigInteger('id_emploi_du_temps');
            $table->foreign('id_emploi_du_temps')->references('id')->on('emploi_du_temps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
