<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
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
    private $valorTotal;
    private $valorMensal;
    private $anos;
    private $anoDefido;
    private $numAlunos;
    private $intervalo;
    public function __construct(){
        $this->mensalidade = new Mensalidade();
        $this->aluno = new Aluno();
        $this->numAlunos = Aluno::all()->count();


        $anoActual = date('Y');
        $this->anos = Def_Mensalidade::query()->pluck('ano');
        $def = Def_Mensalidade::query()->where('ano',$anoActual)->get();
        foreach ($def as $d){
            $this->valorTotal = ($d->intervalo+1)*$d->valormensal;
            $this->valorMensal = $d->valormensal;
            $this->anoDefido = $d->ano;
            $this->intervalo = $d->intervalo;
        }
    }

    public function index(){
        $alunos = Aluno::all();
        $mesesPagos = $this->getMesesPagos($this->anoDefido);
        $mesesAPagar = $this->getMesAPagar($this->anoDefido);
        $anosPay = $this->anos;
        return view('mensalidade.listar',['valorMensal'=>$this->valorMensal,'valorTotal'=>$this->valorTotal, 'alu'=>$alunos,'numAlunos'=>$this->numAlunos,'anos'=>$anosPay,'mesesPagos'=>$mesesPagos,'mesesAPagar'=>$mesesAPagar,'intervalo'=>$this->intervalo]);
    }

    public function listarPorAluno(){
        $alun = Aluno::query()->where('id',$_POST['idAluno'])->first();
        $mensalidade = PagamntoMensalidade::query()
            ->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')
            ->join('pagamentos','pagamnto_mensalidades.idPagamento','=','pagamentos.id')
            ->join('alunos','pagamnto_mensalidades.idAluno','=','alunos.id')
            ->select('mensalidades.estado as mesEstado','alunos.*','mensalidades.*','pagamentos.*','pagamnto_mensalidades.*')
            ->where('idAluno',$_POST['idAluno'])->where('anoPago',$_POST['ano'])->get();

        $this->valorMensal =40;
        /*Para registo de mensalidade*/
        $mesesPagos = '';
        $def = Def_Mensalidade::query()->join('mes','def__mensalidades.mescomeco','=','mes.numero')->select('mes.*')->where('ano',$_POST['ano'])->first();
        foreach ($mensalidade as $ms){$mesesPagos = $mesesPagos.' '.$ms->mes;}
        $mesNaoP = Mes::query()->select('nome')->whereNotIn('nome',explode(' ',trim(rtrim($mesesPagos))))->where('numero','>=',$def->numero)->get();
        $inscricao = Inscricao::query()->join('alunos','inscricaos.idAluno','=','alunos.id')
            ->join('cursos','inscricaos.idCurso','=','cursos.id')
            ->select('cursos.*')
            ->where('idAluno',$_POST['idAluno'])->where('ano',$_POST['ano'])->get();
        return  response()->json(array('mensal'=> $mensalidade,'foto'=>$alun->foto,'mesesNao'=>$mesNaoP,'curso'=>$inscricao));
    }


    public function registarMensalidade(){
        $aluno = Aluno::all();
        return view('mensalidade.registar',['alu'=>$aluno,'valorMensal'=>$this->valorMensal,'valorTotal'=>$this->valorTotal]);
    }

    public function getDevedoresMes(){

        $tabela =$_POST['tabela'];
        $idAlunos = PagamntoMensalidade::query()->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')->select('idAluno')->where('mes',$_POST['mes'])->get();
        $ids='';
//        $valorDivida=0;
        foreach ($idAlunos as $i){
            $ids = $i->idAluno.' '.$ids;
        }
        $arrayIds = explode(' ',trim(rtrim($ids)));
        if($tabela == 'devedor'){
//            $devedores = Aluno::query()->join('turma_alunos','turma_alunos.idAluno','=','alunos.id')
//                ->join('turmas','turma_alunos.idTurma','=','turmas.id')
//                ->select('turmas.nome as nomeTurma','alunos.nome as nomeAluno','alunos.*','cursos.nome as curso')
//                ->whereNotIn('idAluno',$arrayIds)->where('ano','=',$_POST['ano'])->get();
//
//

            $devedores = Inscricao::query()
                ->join('alunos','alunos.id','=','inscricaos.idAluno')
                ->join('cursos','cursos.id','=','inscricaos.idCurso')
                ->join('turmas','turmas.idCurso','=','inscricaos.idCurso')
                ->select('alunos.nome as nomeAluno','alunos.*','cursos.nome as curso','cursos.valormensal as divida','turmas.nome as turma')
                ->whereNotIn('inscricaos.idAluno',$arrayIds)->where('inscricaos.ano','=',$_POST['ano'])->get();
            return response()->json(array('devedor'=>$devedores));
        }elseif ($tabela == 'naodevedor'){

            $naddevedores = Inscricao::query()
                ->join('alunos','alunos.id','=','inscricaos.idAluno')
                ->join('cursos','cursos.id','=','inscricaos.idCurso')
                ->join('turmas','turmas.idCurso','=','inscricaos.idCurso')
                ->select('alunos.nome as nomeAluno','alunos.*','cursos.nome as curso','cursos.valormensal as divida','turmas.nome as turma')
                ->whereIn('inscricaos.idAluno',$arrayIds)->where('inscricaos.ano','=',$_POST['ano'])->get();
            return response()->json(array('naodevedor'=>$naddevedores));
        }
    }

    /*Retorna uma lista de todos o meses que ainda nao foi feito pagamento*/
    public function getMesAPagar($ano){
        $mesesApagar='';
        $defin =Def_Mensalidade::query()->where('ano',$ano)->get();
        $mesesKexis = Mensalidade::query()->distinct()->pluck('mes')->count();
        foreach ($defin as $df){
            $mesIncial = $df->mescomeco;
            $mesFim = $df->mesfim;

            for ($numMes = $mesIncial+$mesesKexis; $numMes <= $mesFim; $numMes++){
                $getMeses = Mes::query()->where('numero',$numMes)->get();
                foreach ($getMeses as $r){
                    $mesesApagar = $mesesApagar.' '.$r->nome;
                }
            }
        }
        return explode(' ',trim(rtrim($mesesApagar)));
    }

    public function getMesesPagos($ano){
        $mesesPagos = Mensalidade::query()->distinct()->select('mes')->where('ano',$ano)->get();
        return $mesesPagos;
    }

    public function getModal(){

        return view('mensalidade.modal');
    }
}
