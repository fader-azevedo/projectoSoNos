<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration{
    public function up(){
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observacao');
            $table->date('dataIngresso');
            $table->date('dataFim');
            $table->integer('idAluno')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('historicos');
    }
}
