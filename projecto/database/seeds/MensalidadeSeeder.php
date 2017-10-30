<?php

use Illuminate\Database\Seeder;

class MensalidadeSeeder extends Seeder{

    public function run(){

        DB::table('mensalidades')->insert([
           'mes' => 'Fevereiro',
            'estado' => 'pago',
        ]);
        DB::table('mensalidades')->insert([
           'mes' => 'Fevereiro',
            'estado' => 'pago',
        ]);
        DB::table('mensalidades')->insert([
           'mes' => 'Março',
            'estado' => 'pago',
        ]);


    }
}
