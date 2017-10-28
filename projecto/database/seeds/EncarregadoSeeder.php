<?php

use Illuminate\Database\Seeder;

class EncarregadoSeeder extends Seeder{

    public function run(){

        DB::table('encarregados')->insert([
           'apelido' => 'Macuvele',
            'nome' => 'Azevedo Elias',
            'sexo' => 'Masculino',
            'idContacto' => '1'
        ]);

        DB::table('encarregados')->insert([
           'apelido' => 'Mandlate',
            'nome' => 'Julio ',
            'sexo' => 'Masculino',
            'idContacto' => '2'
        ]);
    }
}
