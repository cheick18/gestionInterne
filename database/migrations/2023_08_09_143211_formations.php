<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Formations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('categories_id');
            $table->string('nom');
            $table->integer('prix');
            // Ajoutez d'autres colonnes selon vos besoins
            $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
