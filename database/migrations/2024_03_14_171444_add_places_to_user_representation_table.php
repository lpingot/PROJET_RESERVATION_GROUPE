<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlacesToUserRepresentationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_representation', function (Blueprint $table) {
            $table->integer('places', false, true)->length(11); // Remplacez 'another_column' par le nom de la colonne après laquelle vous voulez ajouter 'places'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_representation', function (Blueprint $table) {
            $table->dropColumn('places');
        });
    }
}
