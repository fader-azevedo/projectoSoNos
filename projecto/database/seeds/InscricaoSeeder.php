<?php

use Illuminate\Database\Seeder;

class InscricaoSeeder extends Seeder{

    public function run(){

//        DB::table('inscricaos')->insert([
//            'idAluno' =>'1',
//            'idCurso' => '1',
//            'ano' => '2017',
//            'dataInsc' => '2017-04-05'
//        ]);
        DB::table('inscricaos')->insert([
            'idAluno' =>'2',
            'idCurso' => '1',
            'ano' => '2017',
            'dataInsc' => '2017-04-05'
        ]);
    }
}
