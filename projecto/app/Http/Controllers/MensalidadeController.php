<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Mensalidade;
use App\Inscricao;
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
        $aluno = Aluno::all();
        $anos = Mensalidade::query()->distinct()->pluck('ano');
        $meses = Mensalidade::query()->distinct()->pluck('mes');
        return view('mensalidade.listar',['mensalidade'=>$mensalidade, 'alunos' => $aluno,'anos'=>$anos,'meses'=>$meses,'numAluno'=>$aluno->count()]);
    }


    public function listarPorAluno(){
        $aluno = Aluno::query()->find($_POST['idAluno']);
        $mensalidade = Mensalidade::query()->select('*')->where('idAluno',$_POST['idAluno'])->where('ano',$_POST['ano'])->get();

        /*buscar dados de inscricao*/
        $inscricao = Inscricao::query()->join('disciplinas','inscricaos.idDisciplina','=','disciplinas.id')
            ->join('alunos','inscricaos.idAluno','=','alunos.id')
            ->select('disciplinas.*')->where('idAluno',$_POST['idAluno'])->get();
        return  response()->json(array('aluno' =>$aluno,'mensal'=> $mensalidade,'inscricao'=> $inscricao));
    }

    public function listarPorMes(){
        $mensalidade = Mensalidade::query()
            ->join('alunos','mensalidades.idAluno','=','alunos.id')
            ->select('alunos.*','mensalidades.*')->where('ano',$_POST['ano'])->where('mes',$_POST['mes'])->get();
        return  response()->json(array('mensal'=> $mensalidade));
    }


    public function registarMensalidade(){
        $aluno = Aluno::all();
        $meses = array('Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        return view('mensalidade.registar',['aluno'=>$aluno,'meses'=>$meses]);

    }


}
