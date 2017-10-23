<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration{

    public function up(){
        Schema::create('alunos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('apelido');
            $table->string('nome');
            $table->enum('sexo',['Masculino','Feminino']);
            $table->date('dataNasc');
            $table->string('tipoDoc');
            $table->string('numDoc')->unique();
            $table->string('foto');
            $table->string('estado');
            $table->integer('idencarregado')->unsigned();
            $table->integer('iduser')->unsigned();
            $table->timestamps();
        });

        Schema::table('alunos',function ($table){
            $table->foreign('idencarregado')->references('id')->on('encarregados');
            $table->foreign('iduser')->references('id')->on('users');
        });
    }

    public function down(){
        Schema::dropIfExists('alunos');
    }
}
