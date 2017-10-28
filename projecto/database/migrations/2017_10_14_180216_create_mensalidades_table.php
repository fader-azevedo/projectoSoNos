<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadesTable extends Migration{

    public function up(){
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes');
            $table->enum('estado',['pago','adiantado','nao pago']);
            $table->integer('idAluno')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('mensalidades');
    }
}
