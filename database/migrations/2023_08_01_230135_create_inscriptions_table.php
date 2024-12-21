<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lp_id')->nullable();
            $table->unsignedBigInteger('forma_id')->nullable();
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->unsignedBigInteger('master_id')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('list_certifs_id')->nullable();
             $table->string('Nom');
            $table->string('Prenom');
            $table->string('CIN')->unique();
            $table->string('Niveau');
            $table->string('Specialite');
            $table->string('Telephone')->unique();
            $table->string('whatsapp')->unique()->nullable();
            




          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
