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
        $alunos = Aluno::all();
// :query()->distinct()->pluck('mes');
//        $anos = Mensalidade::query()->distinct()->pluck('ano');
//        $meses = Mensalidade::query()->distinct()->pluck('mes');
//        return view('mensalidade.listar',['mensalidade'=>$mensalidade, 'alunos' => $aluno,'anos'=>$anos,'meses'=>$meses,'numAluno'=>$aluno->count()]);
//
        /*Mes que pelo menos um aluno pagou mensalidade*/
        $mesesPagos = Mensalidade::query()->distinct()->pluck('mes');
        $mensalidade = Mensalidade::all();
        $anos  = Def_Mensalidade::query()->pluck('ano');
        return view('mensalidade.listar',['alu'=>$alunos,'anos'=>$anos,'mesesPagos'=>$mesesPagos,'mensalidade'=>$mensalidade,'mesesAPagar'=>$this->getMesAPagar($anos->first())]);
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
        $alun = Aluno::query()->where('id',$_POST['idAluno'])->first();
        $mensalidade = PagamntoMensalidade::query()
            ->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')
            ->join('pagamentos','pagamnto_mensalidades.idPagamento','=','pagamentos.id')
            ->join('alunos','pagamnto_mensalidades.idAluno','=','alunos.id')
            ->select('mensalidades.*','pagamentos.*','alunos.*')->where('idAluno',$_POST['idAluno'])->where('anoPago',$_POST['ano'])->get();
        return  response()->json(array('mensal'=> $mensalidade,'foto'=>$alun->foto));
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
//        $idAlunos = Mensalidade::query()->where('mes','=',$_POST['mes'])->select('idAluno')->get();
        $idAlunos = PagamntoMensalidade::query()->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')
            ->select('idAluno')->where('mes',$_POST['mes'])->get();
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


    public function factura(){
//        $tabela = $_POST['tabela'];
        $tabela = '<label>Skubera</label>';

        header("Content-type: application/vnd.ms-excel");
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename=fileAKI.xls");
        header("Pragma: no-cache");

        echo $tabela;
//        echo '<script>alert("chegou");</script>';

        return view('template.file',['tabela'=>$tabela]);
    }
}
