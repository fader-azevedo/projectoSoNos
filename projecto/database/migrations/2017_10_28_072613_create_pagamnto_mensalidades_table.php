<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamntoMensalidadesTable extends Migration{
    public function up(){
        Schema::create('pagamnto_mensalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valorTotal');
            $table->double('divida');
            $table->string('mesesparciados')->nullable();
            $table->string('estado')->nullable();
            $table->integer('anoPago')->nullable();

            $table->integer('idMensalidade')->unsigned();
            $table->foreign('idMensalidade')->references('id')->on('mensalidades')->onDelete('cascade');

            $table->integer('idPagamento')->unsigned();
            $table->foreign('idPagamento')->references('id')->on('pagamentos')->onDelete('cascade');

            $table->integer('idAluno')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('pagamnto_mensalidades');
    }
}
