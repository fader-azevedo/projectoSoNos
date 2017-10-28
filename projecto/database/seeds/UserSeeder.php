<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
//        DB::table('users')->insert([
//            'email' => 'lenovo@gmial.com',
//            'username' => 'lenovo',
//            'password' => 'lenovo',
//            'perfil' => 'aluno',
//            'foto' => 'foto01.jpg',
//        ]);

        DB::table('users')->insert([
            'email' => 'lenovo@gmail.com',
            'username' => 'toshiba',
            'password' => 'lenovo',
            'perfil' => 'aluno',
            'foto' => 'foto02.jpg',
        ]);
    }
}
