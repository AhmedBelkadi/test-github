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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->string("date");
            $table->unsignedBigInteger('id_seance');
            $table->foreign('id_seance')->references('id')->on('seances')->onDelete('cascade');
            $table->unsignedBigInteger('id_etudiant');
            $table->foreign('id_etudiant')->references('id')->on('etudiants')->onDelete('cascade');
            $table->timestamps();
        });
    }
//            $table->unsignedBigInteger('id_justification');
//            $table->foreign('id_justification')->references('id')->on('justifications')->onDelete('cascade');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
