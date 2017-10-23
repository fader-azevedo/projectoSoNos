<?php

use Illuminate\Database\Seeder;

class MensalidadeSeeder extends Seeder{

    public function run(){

        DB::table('mensalidades')->insert([
           'mes' => 'Maio',
            'dataP' => '2017-05-04',
            'ano' => '2017',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '1'
        ]);

        DB::table('mensalidades')->insert([
            'mes' => 'Maio',
            'dataP' => '2017-05-04',
            'ano' => '2017',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '2'
        ]);

        DB::table('mensalidades')->insert([
            'mes' => 'Junho',
            'dataP' => '2017-06-23',
            'ano' => '2017',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '1'
        ]);

        DB::table('mensalidades')->insert([
            'mes' => 'Junho',
            'dataP' => '2017-06-24',
            'ano' => '2017',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '2'
        ]);

        DB::table('mensalidades')->insert([
            'mes' => 'Maio',
            'dataP' => '2018-05-04',
            'ano' => '2018',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '2'
        ]);

        DB::table('mensalidades')->insert([
            'mes' => 'Junho',
            'dataP' => '2018-06-23',
            'ano' => '2018',
            'valor' => '700',
            'divida' => '0',
            'estado' => 'pago',
            'idAluno' => '1'
        ]);
    }
}
