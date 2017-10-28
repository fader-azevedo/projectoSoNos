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
            'abreviatura'=>'PT',
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'História',
            'abreviatura'=>'HS',
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Matemática',
            'abreviatura'=>'MT',
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Química',
            'abreviatura'=>'QI',
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Física',
            'abreviatura'=>'FS',
        ]);

        DB::table('disciplinas')->insert([

            'nome' =>'Biologia',
            'abreviatura'=>'BO',
        ]);
    }
}
