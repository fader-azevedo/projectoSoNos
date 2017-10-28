<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoDisciplinasTable extends Migration{

    public function up(){
        Schema::create('curso_disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCurso')->unsigned();
            $table->integer('idDisciplina')->unsigned();

            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->foreign('idDisciplina')->references('id')->on('disciplinas');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('curso_disciplinas');
    }
}
