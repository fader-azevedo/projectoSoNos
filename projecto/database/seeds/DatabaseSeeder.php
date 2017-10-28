<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
//        $this->call(UserSeeder::class);
//        $this->call(DisciplinaTableSeeder::class);
//        $this->call(ContactoSeeder::class);
//        $this->call(EncarregadoSeeder::class);
//        $this->call(AlunoSeeder::class);
//        $this->call(InscricaoSeeder::class);
//        $this->call(MensalidadeSeeder::class);
//        $this->call(CursoSeeder::class);
//        $this->call(CursoDisciplinaSeeder::class);
        $this->call(MesSeeder::class);
    }
}
