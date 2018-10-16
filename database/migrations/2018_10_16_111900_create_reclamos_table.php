<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('zona')->nullable();
            $table->string('barrio')->nullable();
            $table->string('calle')->nullable();
            $table->float('latitud');
            $table->float('longitud');
            $table->string('estado')->nullable();

            $table->integer('categoria_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('uv_id')->nullable();
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
        Schema::dropIfExists('reclamos');
    }
}
