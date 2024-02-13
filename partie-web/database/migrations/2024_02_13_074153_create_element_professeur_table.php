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
        Schema::create('element_professeur', function (Blueprint $table) {
            $table->primary(["id_professur","id_element"]);
            $table->unsignedBigInteger('id_professur');
            $table->foreign('id_professur')->references('id')->on('professeurs')->onDelete('cascade');
            $table->unsignedBigInteger('id_element');
            $table->foreign('id_element')->references('id')->on('elements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element_professeur');
    }
};
