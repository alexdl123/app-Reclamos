<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_id')->unsigned();
            $table->string('nombre',50);
            $table->integer('poblacion');
            $table->string('extension',30);
            $table->integer('unidades_vec');
            $table->integer('barrios');
            $table->string('aniversario',50);
            $table->string('norte',30);
            $table->string('sur',30);
            $table->string('este',30);
            $table->string('oeste',30);
            $table->char('estado',1);
            
           // $table->foreign('municipio_id')->references('id')->on('municipios')->delete('cascade');
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
        Schema::dropIfExists('distritos');
    }
}
