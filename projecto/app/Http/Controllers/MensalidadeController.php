<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Mensalidade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MensalidadeController extends Controller{


    private $mensalidade;
    private $aluno;
    public function __construct(){
        $this->mensalidade = new Mensalidade();
        $this->aluno = new Aluno();
    }

    public function index(){
        $mensalidade = Mensalidade::all();
        $numAluno = Aluno::all()->count();
        $aluno = Aluno::all();
        $anos = Mensalidade::query()->distinct()->pluck('ano');
        $meses = Mensalidade::query()->distinct()->pluck('mes');
        return view('mensalidade.listar',['mensalidade'=>$mensalidade, 'alunos' => $aluno,'anos'=>$anos,'meses'=>$meses,'numAluno'=>$numAluno]);
    }


    public function listarPorAluno(){
        $aluno = Aluno::query()->find($_POST['idAluno']);
        $mensalidade = Mensalidade::query()->select('*')->where('idAluno',$_POST['idAluno'])->where('ano',$_POST['ano'])->get();
        return  response()->json(array('aluno' =>$aluno,'mensal'=> $mensalidade));
    }

    public function listarPorMes(){
        $mensalidade = Mensalidade::query()
            ->join('alunos','mensalidades.idAluno','=','alunos.id')
            ->select('alunos.*','mensalidades.*')->where('ano',$_POST['ano'])->where('mes',$_POST['mes'])->get();
        return  response()->json(array('mensal'=> $mensalidade));
    }

}
