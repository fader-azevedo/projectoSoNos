<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesTable extends Migration{
    public function up(){
        Schema::create('mes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->unique();
            $table->string('nome')->uinque();
        });
    }

    public function down(){
        Schema::dropIfExists('mes');
    }
}
