<?php

use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

//        DB::table('contactos')->insert([
//
//            'telefone' =>'84321674',
//            'email'=>'lenoovo@lenovo.com',
//        ]);
//
//        DB::table('contactos')->insert([
//
//            'telefone' =>'82456987',
//            'email'=>'lenoovo@hasd.com',
//        ]);

        DB::table('contactos')->insert([

            'telefone' =>'8678945',
            'email'=>'lenoovo@gmail.com',
        ]);

        DB::table('contactos')->insert([

            'telefone' =>'841259414',
            'email'=>'lenovo@yahoo.com',
        ]);
    }
}
