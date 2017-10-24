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


    <h5 class="center-align">
        <span class=""><i class="fa fa-pencil"></i></span>
        Registar Mensalidade
    </h5>


    <div class="row" style="padding-left: 30px">
        <div class="col-md-3 col-sm-3 col-lg-3 ">
            <div class="input-field">
                <i class="zmdi zmdi-account-circle prefix"></i>
                <input id="selectAluno" placeholder="Aluno"  type="text" list="listaAluno">
                <datalist id="listaAluno">
                    @foreach($aluno  as $ms)
                        <option id="{{$ms->id}}" value="{{$ms->nome}}">{{$ms->nome}}</option>
                    @endforeach
                </datalist>
            </div>
            <div class=" alunuDetalhes row">
                <div class="col-md-12 col-sm-12 col-lg-12"  >
                    <img id="idFoto" src="{!! asset('img/logo.jpg')!!}" class="materialboxed centered img-rounded" width="175" height="170">
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-8 col-lg-8"  style="padding-top: 15px;">
            <div id="DivMeses" style="background-color: #8eb4cb; padding:10px; height: 100px;  display: flex">
                <div style="background-color: white; margin-right: -5px; position: relative; height: 25px; width: 25px; border-radius: 50%"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: #2a2a2a; margin: 5px 5px 0 0; height: 15px; width: 75px;"></div>
                <div style="background-color: white; margin-left: -10px; height: 25px; width: 25px; border-radius: 50%"></div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {


            $('#selectAluno').on('input', function () {
                var op = $('option[value="' + $(this).val() + '"]');
                var idAluno = op.length ? op.attr('id') : '';
                if (idAluno === '' || $('#selectAluno').val().length === 0) {
                    return;
                }

                var ano = new Date().getFullYear();
                $.ajax({
                    url: 'api/listarPorAluno2',
                    type: 'POST',
                    data: {'idAluno': idAluno, 'ano': ano},
                    success: function (rs) {
                        alert('ja esta');
//                        for (var i=0; i< rs.mensal.length; i++){
////                            $('#DivMeses').append();
//
//                        }
                    }
                })
            });
        })
    </script>
@endsection