@extends('template.app')
@section('menu')
    <li class="mt">
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>

    <li class="sub-menu">
        <a class="active" href="javascript:;" >
            <i class="fa fa-money"></i>
            <span>Mensalidades</span>
        </a>
        <ul class="sub">
            <li class="active"><a  href="{!! url('/mensalidade/registar') !!}">Registar</a></li>
            <li><a  href="{!! url('/mensalidade') !!}">Listar</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-users"></i>
            <span>Alunos</span>
        </a>
        <ul class="sub">
            <li><a  href="{!! url('/aluno') !!}">Todos</a></li>
            <li><a  href="">Inscritos</a></li>
            <li><a  href="">Não Inscritos</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-history"></i>
            <span>Historico</span>
        </a>
        <ul class="sub">
            <li><a  href="">Aluno</a></li>
            <li><a  href="">Todos</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-bar-chart-o"></i>
            <span>Estatísticas</span>
        </a>
        <ul class="sub">
            <li><a  >Chartjs</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-book"></i>
            <span>Extras</span>
        </a>
        <ul class="sub">
            <li><a>Lock</a></li>
        </ul>
    </li>

@endsection
@section('content')

    <h5 class="center-align tooltippy">
        <span class=""><i class="fa fa-pencil"></i></span>
        Registar Mensalidade
        <span class="tooltippytext">tooltippy Fader</span>
    </h5>

    <section class="row" style="padding-left: 40px" id="DivRegistarMensalidade">
        {{--<div class="row">--}}
            <div class="col-md-3 col-sm-3 col-lg-3 ">
                <div class="input-field">
                    <i class="zmdi zmdi-account-circle prefix"></i>
                    <input id="selectAluno2" placeholder="Aluno"  type="text" list="listaAluno">
                    <datalist id="listaAluno">
                        @foreach($aluno  as $ms)
                            <option id="{{$ms->id}}" value="{{$ms->nome}}">{{$ms->nome}}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class=" alunuDetalhes row">
                    <div class="col-md-12 col-sm-12 col-lg-12"  >
                        <img id="idFoto" src="{!! asset('img/logo.jpg')!!}" class="materialboxed centered img-circle" width="175" height="170">
                    </div>
                </div>
            </div>
            <div  class="col-md-2 col-sm-2 col-lg-2" >
                <div class="input-field" style="background-color: #ffffff;">
                    <i class="zmdi zmdi-format-list-numbered prefix"></i>
                    <input id="numb" type="number" min="1" >
                    <label for="numb">Quantidade</label>
                </div>

                <a class="myIcon"><i class="zmdi zmdi-calendar"></i></a>
                <div id="divMesesAPAGAR">
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div id="divDisciplinas" style="display: flex; padding-top: 30px">
                    <h6>Disciplinas</h6>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12" style="padding-top: 10px;  border-radius: 6px; margin: 10px; background-color:#f2f2f2;height: 60px; display: flex">
                <div class="inicio"><p style="color: #00b0ff" class="centered"><i class="fa fa-check fa-2x"></i></p></div>
                <div id="DivMeses" style=" width: 100%; height: 100px;  display: flex">
                </div>
                <div class="fim tooltipped" data-tooltip=""><p style="color: #171eff" class="centered"><i class="fa fa-star fa-2x"></i></p></div>
            </div>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {


            for(var l = 0; l < meses.length; l++){
                $('#DivMeses').append('<div class="mesesNaoPagos"></div>');
            }

            var contaMeses;
            var numMesesqFaltam;
            var ano = new Date().getFullYear();

            var valorAPagar=0;
            $('#selectAluno2').on('input', function () {
                var op = $('option[value="' + $(this).val() + '"]');
                var idAluno = op.length ? op.attr('id') : '';
                if (idAluno === '' || $('#selectAluno2').val().length === 0) {
                    return;
                }
                contaMeses =0;
                numMesesqFaltam=0;
                var mesess='';
                $.ajax({
                    url: '/api/listarPorAluno',
                    type: 'POST',
                    data: {'idAluno': idAluno, 'ano': ano},
                    success: function (rs) {
                        document.getElementById('idFoto').src = '{{asset('img/upload/')}}'.concat('/' + rs.aluno.foto);
                        $('.mesesPagos').remove();
                        $('.mesesNaoPagos').remove();
                        $('#actual').remove();
                        $('.mesesAPagar').remove();

                        for (var i=0; i< rs.mensal.length; i++){
                            $('#DivMeses').append(' <div class="mesesPagos "></div>');
                            mesess +=rs.mensal[i].mes+' '+'<i style="color: #5bc0de" class="fa fa-check"></i><br/>';
                            contaMeses +=1;
                        }

                        $('#DivMeses').append('<div id="actual" class="tooltippy" data-tooltip="fader" >' +
                            '<p style="color: #3a5fff" class="centered"><i  class="fa fa-check fa-2x"></i></p><span class="tooltippytext">'+mesess+'</span> </div>');
                        for(var k = contaMeses; k < meses.length; k++){
                            $('#DivMeses').append(' <div class="mesesNaoPagos"></div>');
                            numMesesqFaltam +=1;
                        }

                        /*Buscar dados de inscricao*/
                        for(var q=0; q < rs.inscricao.length;q++){
//                            alert(rs.inscricao[q].valorMensal);
                            $('#divDisciplinas').append(' <p>'+rs.inscricao[q].nome+'</p>')
                        }

                        document.getElementById('numb').setAttribute('max',numMesesqFaltam);
                        document.getElementById('numb').setAttribute('min','1');
                        document.getElementById('numb').setAttribute('value','1');
                        $('#divMesesAPAGAR').append('<div class="mesesAPagar"><p class="centered">'+meses[contaMeses]+'</p></div>');
                    }
                })
            });


            $('#numb').change(function () {
                if(numMesesqFaltam.isUndefined)
                    return;
                var valu = $(this).val();
                $('.mesesAPagar').remove();
                for( var w= 0;w < valu;w++){
                   $('#divMesesAPAGAR').append('<div class="mesesAPagar"><p class="centered">'+meses[contaMeses+w]+'</p></div>');
               }
            });
        })
    </script>
@endsection