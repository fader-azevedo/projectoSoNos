<?php

use Illuminate\Database\Seeder;

class MesSeeder extends Seeder{
    public function run(){
        DB::table('mes')->insert([
            'numero' =>'1',
            'nome' => 'Janeiro'
        ]);
        DB::table('mes')->insert([
            'numero' =>'2',
            'nome' => 'Fevereiro'
        ]);

        DB::table('mes')->insert([
            'numero' =>'3',
            'nome' => 'Março'
        ]);

        DB::table('mes')->insert([
            'numero' =>'4',
            'nome' => 'Maio'
        ]);

        DB::table('mes')->insert([
            'numero' =>'5',
            'nome' => 'Abril'
        ]);

        DB::table('mes')->insert([
            'numero' =>'6',
            'nome' => 'Junho'
        ]);

        DB::table('mes')->insert([
            'numero' =>'7',
            'nome' => 'Julho'
        ]);

        DB::table('mes')->insert([
            'numero' =>'8',
            'nome' => 'Agosto'
        ]);

        DB::table('mes')->insert([
            'numero' =>'9',
            'nome' => 'Setembro'
        ]);

        DB::table('mes')->insert([
            'numero' =>'10',
            'nome' => 'Outubro'
        ]);

        DB::table('mes')->insert([
            'numero' =>'11',
            'nome' => 'Novembro'
        ]);

        DB::table('mes')->insert([
            'numero' =>'12',
            'nome' => 'Dezembro'
        ]);
    }
}
