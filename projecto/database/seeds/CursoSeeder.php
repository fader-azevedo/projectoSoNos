<?php

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder{
    public function run(){
        DB::table('cursos')->insert([

            'nome' =>'Informatica',
            'abreviatura'=>'INFO',
        ]);
        DB::table('cursos')->insert([

            'nome' =>'Estatistica',
            'abreviatura'=>'Est',
        ]);
        DB::table('cursos')->insert([

            'nome' =>'Gestao Bancaria',
            'abreviatura'=>'GB',
        ]);

    }
}
