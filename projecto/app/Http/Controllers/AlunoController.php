<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Inscricao;
use App\Mensalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlunoController extends Controller{

    private $mensalidadeController;
    private $alunoController;
    private $aluno;
    public function __construct(MensalidadeController $mensalidadeController){
        $this->mensalidadeController = $mensalidadeController;
        $this->aluno = new Aluno();
    }

    public function index(){
        $listaAluno = Aluno::all();
        return view('aluno.listar');
    }


    public function listar(Request $request){

    }

    public function getDisciplinasAluno(){

    }

}
