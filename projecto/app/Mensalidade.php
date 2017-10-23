<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model{

    protected $fillable =[
        'id','mes','dataP','ano','valor','divida','estado','idAluno'
    ];

    public function getAlunoMensalidade(){
        return $this->belongsTo(Aluno::class ,'idAluno');
    }

//    public function getAll(){
//        $t = DB::table('mensalidades')->
//    }
}
