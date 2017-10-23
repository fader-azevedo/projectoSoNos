<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration{
    public function up(){
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->integer('idAluno')->unsigned();;
            $table->integer('idDisciplina')->unsigned();;
            $table->dateTime('dataInsc');
            $table->enum('turno',['manha','tarde','noite']);
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idDisciplina')->references('id')->on('disciplinas');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('inscricaos');
    }
}
