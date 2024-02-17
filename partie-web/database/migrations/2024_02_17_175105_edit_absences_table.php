<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('absences', function (Blueprint $table) {
            // Check if the 'date' column doesn't already exist
            if (!Schema::hasColumn('absences', 'date')) {
                // Add the 'date' column
                $table->date('date')->nullable();
            }else{
                $table->dropColumn('date');
            }
        });
    }

    public function down()
    {
        Schema::table('absences', function (Blueprint $table) {
            // Drop the 'date' column
        });
    }
};
