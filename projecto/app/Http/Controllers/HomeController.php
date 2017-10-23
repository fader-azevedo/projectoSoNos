<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Disciplina;
use App\Mensalidade;

class HomeController extends Controller{

    public function index(){
        $numMensal = Mensalidade::all()->count();
        $numAluno = Aluno::all()->count();
        $numDisc = Disciplina::all()->count();
        return view('home',['numMensal'=>$numMensal, 'numAlunos' => $numAluno,'numDisc'=>$numDisc]);
    }

    public function lock(){
        return view('template.lock');
    }

    public function logon(){
        return view('template.logon');
    }
}
