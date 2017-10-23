<?php

use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder{

    public function run(){
//        DB::table('alunos')->insert([
//           'apelido' => 'Macuvele',
//            'nome' => 'Jordina',
//            'sexo' => 'Feminino',
//            'dataNasc' => '2006-06-06',
//            'tipoDoc' => 'bi',
//            'numDoc' => '123456789',
//            'foto' => 'foto01.jpg',
//            'estado' => 'inscrito',
//            'idEncarregado' => '1',
//            'iduser' => '1'
//        ]);

        DB::table('alunos')->insert([
           'apelido' => 'Machaieie',
            'nome' => 'Irondino',
            'sexo' => 'Masculino',
            'dataNasc' => '2006-06-06',
            'tipoDoc' => 'bi',
            'numDoc' => '987456321',
            'foto' => 'foto02.jpg',
            'estado' => 'inscrito',
            'idEncarregado' =>'2',
            'iduser' =>'2'
        ]);
    }
}
