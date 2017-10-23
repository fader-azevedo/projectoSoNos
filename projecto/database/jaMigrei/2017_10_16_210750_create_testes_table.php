<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('testes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('nota');
            $table->date('dataT');
            $table->integer('idAluno')->unsigned();
            $table->integer('idDisciplina')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idDisciplina')->references('id')->on('disciplinas');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('testes');
    }
}
