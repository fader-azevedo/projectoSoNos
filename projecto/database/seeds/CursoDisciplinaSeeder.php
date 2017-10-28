<?php

use Illuminate\Database\Seeder;

class CursoDisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('curso_disciplinas')->insert([

            'idCurso' =>'1',
            'idDisciplina'=>'1',
        ]);
        DB::table('curso_disciplinas')->insert([

            'idCurso' =>'1',
            'idDisciplina'=>'2',
        ]);
        DB::table('curso_disciplinas')->insert([

            'idCurso' =>'1',
            'idDisciplina'=>'3',
        ]);
    }
}
