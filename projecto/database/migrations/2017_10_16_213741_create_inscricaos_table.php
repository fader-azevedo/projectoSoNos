<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration{
    public function up(){
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAluno')->unsigned();
            $table->integer('idCurso')->unsigned();
            $table->integer('ano');
            $table->dateTime('dataInsc');
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idCurso')->references('id')->on('cursos');
        });
    }

    public function down(){
        Schema::dropIfExists('inscricaos');
    }
}
