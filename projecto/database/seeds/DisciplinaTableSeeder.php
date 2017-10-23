<?php

use Illuminate\Database\Seeder;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('disciplinas')->insert([

            'nome' =>'Português',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'História',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Matemática',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Química',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Física',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Biologia',
            'valorInscricao'=>'350',
            'valorMensal'=>'700'
        ]);
    }
}
