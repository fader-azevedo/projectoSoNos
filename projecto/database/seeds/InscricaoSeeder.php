<?php

use Illuminate\Database\Seeder;

class InscricaoSeeder extends Seeder{

    public function run(){
//
//        DB::table('inscricaos')->insert([
//            'idAluno' =>'1',
//            'idDisciplina' => '1',
//            'turno' => 'tarde',
//            'dataInsc' => '2017-04-05'
//        ]);

//        DB::table('inscricaos')->insert([
//            'idAluno' =>'1',
//            'idDisciplina' => '3',
//            'turno' => 'tarde',
//            'dataInsc' => '2017-04-05'
//        ]);

        DB::table('inscricaos')->insert([
            'idAluno' =>'2',
            'idDisciplina' => '2',
            'turno' => 'manha',
            'dataInsc' => '2017-04-05'
        ]);

        DB::table('inscricaos')->insert([
            'idAluno' =>'2',
            'idDisciplina' => '4',
            'turno' => 'manha',
            'dataInsc' => '2017-04-05'
        ]);
    }
}
