<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncarregadosTable extends Migration{

    public function up(){
        Schema::create('encarregados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apelido');
            $table->string('nome');
            $table->enum('sexo',['Masculino','Feminino']);
            $table->integer('idContacto')->unsigned();
            $table->foreign('idContacto')->references('id')->on('contactos');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('encarregados');
    }
}
