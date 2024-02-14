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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("tele");
            $table->string("adresse");
            $table->string("cin");
            $table->enum('role', ['professeur', 'etudiant','admin']);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
//            $table->unsignedBigInteger('id_filiere');
//            $table->foreign('id_filiere')->references('id')->on('filieres')->onDelete('cascade');

//            $table->string("role");
//            $table->string("cne")->nullable();
//            $table->string("apogee")->nullable();

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
