<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Disciplina;
use App\Mensalidade;
use App\Mes;

class HomeController extends Controller{

    public function index(){
        $numMensal = Mensalidade::all()->count();
        $numAluno = Aluno::all()->count();
        $numDisc = Disciplina::all()->count();
        $numCuro = Curso::all()->count();

//        $meses = Mes::all();
//        $ms = response()->json(array($meses));

        return view('template.home',['numMensal'=>$numMensal, 'numAlunos' => $numAluno,'numDisc'=>$numDisc,'numCursos'=>$numCuro]);
    }

    public function getlist(){
        $meses = Mes::query()->where('id',2)->pluck('nome');
        return response()->json(array('meses'=>$meses));
    }

    public function lock(){
        return view('template.lock');
    }

    public function logon(){
        return view('template.logon');
    }
}
