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
        Schema::table('user_representation', function (Blueprint $table) {
            $table->string('date')->nullable(); // Utilisez nullable() si le champ peut être vide
        });
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_representation', function (Blueprint $table) {
            //
        });
    }
};
