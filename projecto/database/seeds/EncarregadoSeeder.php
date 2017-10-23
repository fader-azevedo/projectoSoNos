<?php

use Illuminate\Database\Seeder;

class EncarregadoSeeder extends Seeder{

    public function run(){

        DB::table('encarregados')->insert([
           'apelido' => 'Macuvele',
            'nome' => 'Azevedo Elias',
            'sexo' => 'Masculino',
            'contacto' => '824262180'
        ]);

        DB::table('encarregados')->insert([
           'apelido' => 'Mandlate',
            'nome' => 'Julio ',
            'sexo' => 'Masculino',
            'contacto' => '823993664'
        ]);
    }
}
