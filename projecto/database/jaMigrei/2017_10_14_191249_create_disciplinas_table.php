<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration{

    public function up(){
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->double('valorInscricao');
            $table->double('valorMensal');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('disciplinas');
    }
}
