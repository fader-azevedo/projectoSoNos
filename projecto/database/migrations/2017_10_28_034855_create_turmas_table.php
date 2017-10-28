<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration{
    public function up(){
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('ano');
            $table->enum('turno',['manha','tarde','noite']);
            $table->integer('QuantAluno');
            $table->integer('idCurso')->unsigned();
            $table->foreign('idCurso')->references('id')->on('cursos');
        });
    }

    public function down(){
        Schema::dropIfExists('turmas');
    }
}
