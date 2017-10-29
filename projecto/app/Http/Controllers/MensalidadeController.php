<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Def_Mensalidade;
use App\Mensalidade;
use App\Inscricao;
use App\Mes;
use App\PagamntoMensalidade;
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
//        $mensalidade = Mensalidade::all();
//        $aluno = Aluno::all(); :query()->distinct()->pluck('mes');
//        $anos = Mensalidade::query()->distinct()->pluck('ano');
//        $meses = Mensalidade::query()->distinct()->pluck('mes');
//        return view('mensalidade.listar',['mensalidade'=>$mensalidade, 'alunos' => $aluno,'anos'=>$anos,'meses'=>$meses,'numAluno'=>$aluno->count()]);
//
        /*Mes que pelo menos um aluno pagou mensalidade*/
        $mesesPagos = Mensalidade::query()->distinct()->pluck('mes');
        $mensalidade = Mensalidade::all();
        $anos  = Def_Mensalidade::query()->pluck('ano');
        return view('mensalidade.listar',['anos'=>$anos,'mesesPagos'=>$mesesPagos,'mensalidade'=>$mensalidade,'mesesAPagar'=>$this->getMesAPagar($anos->first())]);
    }

    public function listarTodasMensalidades(){
//        $mensalidade = Mensalidade::all();
//        $aluno = Aluno::all();
//        $anos = Mensalidade::query()->distinct()->pluck('ano');
//        $meses = Mensalidade::query()->distinct()->pluck('mes');
//        return view('mensalidade.listar',['mensalidade'=>$mensalidade, 'alunos' => $aluno,'anos'=>$anos,'meses'=>$meses,'numAluno'=>$aluno->count()]);
//
//        $rowMensal = Mensalidade::all()->count();
        //        $mensalidade = PagamntoMensalidade::query()->join('pagamentos','pagamnto_mensalidades.idPagamento','=','pagamentos.id')
//         ->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')
//         ->join('alunos','mensalidades.idAluno','=','alunos.id')
//         ->select('pagamnto_mensalidades.*','mensalidades.*','alunos.nome')->get();


//        $mensalidade = Mensalidade::query()->distinct()->pluck('mes');
//        return response()->json(array('mensalidade' => $mensalidade));
    }


    public function devedoresEnao(){
        $naoDevedores = Mensalidade::query()->where('mes',$_POST['mes'])->count();
        return response()->json(array('naoDevedores'=>$naoDevedores));
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

    public function getDevedoresMes(){
        $idAlunos = Mensalidade::query()->where('mes','=',$_POST['mes'])->select('idAluno')->get();
        $ids='';
        foreach ($idAlunos as $i){
            $ids = $i->idAluno.' '.$ids;
        }
        $arrayIds = explode(' ',trim(rtrim($ids)));
        $idDevedores = Aluno::query()->join('turma_alunos','turma_alunos.idAluno','=','alunos.id')
            ->join('turmas','turma_alunos.idTurma','=','turmas.id')
            ->select('turmas.nome as nomeTurma','alunos.nome as nomeAluno','alunos.*')->whereNotIn('idAluno',$arrayIds)->where('ano','=',$_POST['ano'])->get();
        return response()->json(array('ids'=>$idDevedores));
    }

    public function getMesAPagar($ano){
        $mesesApaga='';
        $defin =Def_Mensalidade::query()->where('ano',$ano)->get();
        $mesesKexis = Mensalidade::query()->distinct()->pluck('mes')->count();
        foreach ($defin as $df){
            $mesIncial = $df->mescomeco;
            $mesFim = $df->mesfim;

            for ($b =$mesIncial+$mesesKexis;$b<=$mesFim;$b++){
                $getMeses = Mes::query()->where('numero',$b)->get();
                foreach ($getMeses as $r){
                    $mesesApaga = $mesesApaga.' '.$r->nome;
                }
            }
        }
        $mesesAP = explode(' ',trim(rtrim($mesesApaga)));
        return $mesesAP;
//        return $mesesApaga;
//        return response()->json(array('mesesAPagar'=>explode(' ',trim(rtrim($mesesApaga)))));
    }

}
