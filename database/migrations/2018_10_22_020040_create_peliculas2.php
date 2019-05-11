<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('año');
            $table->decimal('ctomatoes');
            $table->decimal('cIMDB');
            $table->string('director');
            $table->string('video');
            $table->text('sinapsis');
            $table->string('generos');
        });

        Schema::create('calidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calidad');
        });


        Schema::create('pelicula_calidade', function (Blueprint $table) {
            $table->integer('pelicula_id');
            $table->integer('calidade_id');
            $table->primary(['pelicula_id','calidade_id']);
        });

        Schema::create('similares', function (Blueprint $table) {
            $table->integer('pelicula_id');
            $table->integer('pelicula2_id');
            $table->primary(['pelicula_id','pelicula2_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
        Schema::dropIfExists('calidades');
        Schema::dropIfExists('pelicula_calidade');
        Schema::dropIfExists('similares');
    }
}
