<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('absences', function (Blueprint $table) {
            if (!Schema::hasColumn('absences', 'date')) {
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
