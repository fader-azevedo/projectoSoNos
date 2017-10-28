<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefMensalidadesTable extends Migration{

    public function up(){
        Schema::create('def__mensalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mescomeco');
            $table->string('mesfim');
            $table->double('valormensal');
            $table->double('multa');
            $table->string('intervalo')->nullable();
            $table->integer('diacomeco');
            $table->integer('diafim');
        });
    }

    public function down(){
        Schema::dropIfExists('def__mensalidades');
    }
}
