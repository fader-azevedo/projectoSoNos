<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaAlunosTable extends Migration{

    public function up(){
        Schema::create('turma_alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAluno')->unsigned();
            $table->integer('idTurma')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idTurma')->references('id')->on('turmas');
        });
    }

    public function down(){
        Schema::dropIfExists('turma_alunos');
    }
}
