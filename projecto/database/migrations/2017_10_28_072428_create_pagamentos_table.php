<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration{
    public function up(){
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->dateTime('dataP');
            $table->integer('idAluno')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('pagamentos');
    }
}
