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
        Schema::create('absence_justification', function (Blueprint $table) {
            $table->primary(["id_justification","id_absence"]);
            $table->unsignedBigInteger('id_absence');
            $table->foreign('id_absence')->references('id')->on('absences')->onDelete('cascade');
            $table->unsignedBigInteger('id_justification');
            $table->foreign('id_justification')->references('id')->on('justifications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_justification');
    }
};
