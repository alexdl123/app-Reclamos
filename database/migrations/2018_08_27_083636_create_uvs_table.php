<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distrito_id')->unsigned();
            $table->string('nombre',20);
            $table->string('extension',20);
            $table->string('descripcion',50);
            $table->char('estado',1);

            $table->foreign('distrito_id')->references('id')->on('distritos')->delete('cascade');
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
        Schema::dropIfExists('uvs');
    }
}
