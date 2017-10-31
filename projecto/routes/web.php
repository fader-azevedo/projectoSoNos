<?php
use App\Aluno;
use App\Def_Mensalidade;
use App\Mensalidade;
use App\Inscricao;
use App\Mes;
use App\PagamntoMensalidade;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','HomeController@index');
Route::get('/logon','HomeController@logon');
Route::get('/factura','MensalidadeController@factura');

Route::group(['prefix'=>'mensalidade'], function (){
    Route::get('/','MensalidadeController@index');
    Route::get('registar','MensalidadeController@registarMensalidade');
});

Route::group(['prefix'=>'extras'], function (){
    Route::get('/','HomeController@lock');
});

Route::get('exportDevedoresPDF',function (){

    /*Busca de dados de alunos que devem num determinado ano e mes para  exportar fil=cheiro pdf*/
    $idAlunos = PagamntoMensalidade::query()->join('mensalidades','pagamnto_mensalidades.idMensalidade','=','mensalidades.id')->select('idAluno')->where('mes',$_GET['mes'])->get();
    $ids='';
    foreach ($idAlunos as $i){
        $ids = $i->idAluno.' '.$ids;
    }
    $mesAno = $_GET['mes'].'-'.$_GET['ano'];
    $arrayIds = explode(' ',trim(rtrim($ids)));
    $dados = Aluno::query()->join('turma_alunos','turma_alunos.idAluno','=','alunos.id')->join('turmas','turma_alunos.idTurma','=','turmas.id')->select('turmas.nome as nomeTurma','alunos.nome as nomeAluno','alunos.*')->whereNotIn('idAluno',$arrayIds)->where('ano','=',$_GET['ano'])->get();
    $pdf = PDF::loadView('export.devedores',['dados'=>$dados,'mesAno'=>$mesAno]);
    return $pdf->download('deveores_'.$mesAno.'.pdf');
});



Auth::routes();
//Route::post('listar','MensalidadeController@index')->name('listar');
//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['prefix'=>'aluno'], function (){
//    Route::get('/','AlunoController@index');
//});
//Route::group(['prefix'=>'mensalidade'], function (){
//    Route::get('/','MensalidadeController@index');
//});

