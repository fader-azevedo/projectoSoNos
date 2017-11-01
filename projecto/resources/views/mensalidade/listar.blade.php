@extends('template.app')
@section('menu')
    <li class="treeview">
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-money"></i>
            <span>Mensalidades</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/mensalidade/registar')}}"><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Alunos</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Estatísticas</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-pencil"></i>Alunos</a></li>
            <li><a href=""><i class="fa fa-money"></i> Mensalidade</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-history"></i>
            <span>Históricos</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-users"></i> Alunos</a></li>
            <li><a href=""><i class="fa fa-money"></i> Mensalidades</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Extras</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-lock"></i> Bloquear Tela</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>

@endsection
@section('content')

    <section style="position: relative;">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Mensalidade</a></li>
            <li class="active">Lista</li>
        </ol>
    </section>

    <div class="nav-tabs-custom" style="background-color: #f2f2f2">
        <ul class="nav nav-tabs ">
            <li class="pull-left active"><a data-slide-to="0" href="#carousellDiv" data-toggle="tab"><i class="fa fa-list"></i>&nbsp;Todas</a></li>
            <li><a data-slide-to="1" href="#carousellDiv" data-toggle="tab"><i class="fa fa-users"></i>&nbsp;Por Aluno</a></li>
            <li style="width: 100px;" class="tooltipped" data-tooltip="Selecione o Ano">
                <div >
                    <a class="myIcon"><i class="zmdi zmdi-calendar"></i></a>
                    <select class="material-control2"  id="selectAno">
                        @foreach($anos as $ano)
                            <option value="{{$ano}}">{{$ano}}</option>
                        @endforeach
                    </select>
                </div>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Morris chart - Sales -->
            <div id="carousellDiv" class="carousel slide" data-ride="carousel" data-interval="false">
                <div  class="carousel-inner">
                    <div id="" class="item active">
                        <section class="col-sm-7 col-md-7 col-lg-7" style="padding-top: 14px">
                            <table class="table-striped" id="tabela1">
                                <thead>
                                    <tr>
                                        <th >Mês</th>
                                        <th >Não Devedores</th>
                                        <th >Devedores</th>
                                    </tr>
                                </thead>
                                <tbody id="tabela1Corpo">
                                    @foreach($mesesPagos  as $ms)
                                        <tr>
                                            <td class="">{{$ms}}</td>
                                            <td><a data-mes="{{$ms}}" class="btn btn-info btn-nao-devedor"><i class="fa fa-check"></i>&nbsp;{{\App\Mensalidade::query()->where('mes',$ms)->count()}}</a></td>
                                            <td><a data-mes="{{$ms}}" class="btn btn-danger btn-devedor"><i class="zmdi zmdi-close"></i>&nbsp;{{\App\Aluno::all()->count()-\App\Mensalidade::query()->where('mes',$ms)->count()}}</a></td>
                                            <td><a class="btn btn-primary"><i class="zmdi zmdi-library"></i>&nbsp;Mais detalhes </a></td>
                                        </tr>
                                    @endforeach

                                    @foreach($mesesAPagar as $ot)
                                        <tr>
                                            <td>{{$ot}}</td>
                                            <td><a data-mes="{{$ot}}" class="btn btn-info"><i class="fa fa-check"></i>&nbsp;{{\App\Mensalidade::query()->where('mes',$ot)->count()}}</a></td>
                                            <td><a data-mes="{{$ot}}" class="btn btn-danger btn-devedor"><i class="zmdi zmdi-close"></i>&nbsp;{{\App\Aluno::all()->count()-\App\Mensalidade::query()->where('mes',$ot)->count()}}</a></td>
                                            <td><a disabled="disabled" class="btn btn-default"><i class="zmdi zmdi-library"></i>&nbsp;&nbsp;Sem registo&nbsp;&nbsp;</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                        <section class=" col-sm-5 col-md-5 col-lg-5 ">

                            <div class="box box-danger" id="alertExport" style="background-color: #ff8e87; color: white">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Erro</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">

                                </div>
                            </div>

                            {{--tabela Nao Devedores--}}
                            <div class="box box-info" id="boxNaoDevedor">
                                <div class="box-header with-border">
                                    <h3 style="color: #00c0ef" class="box-title"><i class="fa fa-users"></i>&nbsp;Alunos Sem Divida</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <h5 class="left"><i class="fa fa-calendar-o"></i>&nbsp;<label style="min-width: 60px; font-size: 14px" id="tiluloMesPago"></label></h5>

                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard"></i>&nbsp;Exportar
                                            <span class="caret"></span>
                                            <span class="sr-only"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a style="cursor: pointer;" id="ExportExcelNaoDevedor"><i style="color: green" class="fa fa-file-excel-o"></i>Excel</a></li>
                                            <li class="divider"></li>
                                            <li ><a  style="cursor: pointer;" id="ExportPdfNaoDevedor"><i style="color: red" class="fa fa-file-pdf-o"></i>Pdf</a></li>
                                        </ul>
                                    </div>
                                    <table class="striped" id="tabelaNaoDevedores" >
                                        <thead>
                                        <tr>
                                            <th id="MesAnoNaoDivida" class="anoExport"></th>
                                        </tr>
                                        <tr>
                                            <th>Nome do Aluno</th>
                                            <th>Turma</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tabelaCorpoNaoDevedor">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--tabela de devedores--}}
                            <div class="box box-danger" id="boxDevedor">
                                <div class="box-header with-border">
                                    <h3 style="color: #dd4b39" class="box-title"><i class="fa fa-users"></i>&nbsp;Alunos Devedores</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                                    </div>
                                </div>
                                <div class="box-body" >
                                    <h5 class="left"><i class="fa fa-calendar-o"></i>&nbsp;<label style="min-width: 60px; font-size: 14px" id="tiluloMesDivida"></label></h5>

                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard"></i>&nbsp;Exportar
                                            <span class="caret"></span>
                                            <span class="sr-only"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a style="cursor: pointer;" id="ExportExcelDevedor"><i style="color: green" class="fa fa-file-excel-o"></i>Excel</a></li>
                                            <li class="divider"></li>
                                            <li><a style="cursor: pointer;" id="ExportPdfDevedor"><i style="color: red" class="fa fa-file-pdf-o"></i>Pdf</a></li>
                                        </ul>
                                    </div>
                                    <table class="striped" id="tabelaDevedores" >
                                        <thead>
                                            <tr>
                                                <th id="MesAnoDivida" class="anoExport"></th>
                                            </tr>
                                            <tr>
                                                <th>Nome do Aluno</th>
                                                <th>Turma</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabelaCorpoDevedores">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="item row">
                        {{--@section('filho')--}}
                            @include('mensalidade.aluno')
                        {{--@endsection--}}
                        {{--<div class="col-md-4 col-sm-4 col-lg-4 ">--}}
                            {{--<div class="input-field">--}}
                                {{--<i class="zmdi zmdi-account-circle prefix"></i>--}}
                                {{--<input id="inPutAluno" type="text" list="listaAluno">--}}
                                {{--<datalist id="listaAluno">--}}
                                    {{--@foreach($alu  as $a)--}}
                                        {{--<option id="{{$a->id}}" value="{{$a->nome.' '.$a->apelido}}">{{$a->nome.' '.$a->apelido}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</datalist>--}}
                            {{--</div>--}}

                            {{--<div class="box box-widget widget-user">--}}
                                {{--<!-- Add the bg color to the header using any of the bg-* classes -->--}}
                                {{--<div class="widget-user-header bg-aqua-active">--}}
                                    {{--<p class="centered">Nome</p>--}}
                                {{--</div>--}}
                                {{--<div class="widget-user-image">--}}
                                    {{--<img id="idFoto" class="img-circle" src="{!! asset('img/logo.jpg') !!}" alt="">--}}
                                {{--</div>--}}
                                {{--<div class="box-footer">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-4 border-right">--}}
                                            {{--<div class="description-block">--}}
                                                {{--<div class="sm-st tooltipped" data-tooltip="Valor Pago">--}}
                                                    {{--<p class="centered">--}}
                                                        {{--<span class="sm-st-icon st-blue"><i class="fa fa-money"></i></span>--}}
                                                    {{--</p>--}}
                                                    {{--<div class="sm-st-info centered">--}}
                                                        {{--<p id="valorPago">0</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-4 border-right">--}}
                                            {{--<div class="description-block">--}}
                                                {{--<div class="sm-st  tooltipped"  data-tooltip="Divida">--}}
                                                    {{--<p class="centered">--}}
                                                        {{--<span class="sm-st-icon st-red"><i class="fa fa-money"></i></span>--}}
                                                    {{--</p>--}}
                                                    {{--<div class="sm-st-info centered">--}}
                                                        {{--<p id="valorDivida">0</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-4">--}}
                                            {{--<div class="description-block">--}}
                                                {{--<div class="sm-st tooltipped" data-tooltip="Total a Pagar" >--}}
                                                    {{--<p class="centered">--}}
                                                        {{--<span class="sm-st-icon st-violet"><i class="fa fa-money"></i></span>--}}
                                                    {{--</p>--}}
                                                    {{--<div class="sm-st-info centered">--}}
                                                        {{--<p>{{$valorTotal}}</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-122 col-sm-12 col-log-12" style="padding-bottom: 0">--}}
                                            {{--<div class="progress progress-striped ">--}}
                                                {{--<div id="barWidth" class="progress-bar tooltipped"  role="progressbar"   aria-valuemin="0" aria-valuemax="100" data-tooltip="% de Pagamento Feito">--}}
                                                    {{--<span class="centered" style="font-size: 13px;"  id="percPago"></span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8 col-sm-8 col-lg-8" id="divTabela2" style="padding-top: 15px;">--}}
                            {{--<table id="tabela2" class="table-striped">--}}
                                {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>Mes</th>--}}
                                        {{--<th>Data de Pagamento</th>--}}
                                        {{--<th>Situação</th>--}}
                                    {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody id="tabela2Corpo">--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            /*Action de tabela de devedores*/
            $('#alertExport').hide();
            var ano = document.getElementById('selectAno').value;

            /*Lista todos Devedores de um mes especifico */
            $('.btn-devedor').on('click', function(){
                var mes= $(this).attr('data-mes');
                $.ajax({
                    url: '/api/getDevedoresMes',
                    type: 'POST',
                    data: {'mes': mes, 'ano': ano, 'tabela':'devedor'},
                    success: function (rs) {
                        if(rs.devedor.length<=0){
                            return;
                        }
                        $('#boxNaoDevedor').addClass('collapsed-box').slideUp();
                        $('#boxDevedor').removeClass('collapsed-box').slideDown(1);

                        $('.rm').remove();
                        document.getElementById('tiluloMesDivida').innerHTML = mes;
                        document.getElementById('MesAnoDivida').innerHTML = 'Alunos Devedores'+' '+mes+'-'+ano;
                        $('MesAnoDivida').slideDown();
                        for(var k =0; k < rs.devedor.length; k++){
                            $('<tr class="rm"><td>'+rs.devedor[k].nomeAluno+' '+ rs.devedor[k].apelido+'</td><td>'+rs.devedor[k].nomeTurma+'</td></tr>').hide().appendTo('#tabelaCorpoDevedores').fadeIn(1000);
                        }
                    }
                })
            });
            /*lista todos nao devedores*/
            $('.btn-nao-devedor').on('click', function () {

                var mes= $(this).attr('data-mes');
                $.ajax({
                    url: '/api/getDevedoresMes',
                    type: 'POST',
                    data: {'mes': mes, 'ano': ano, 'tabela':'naodevedor'},
                    success: function (rs) {
                        if(rs.naodevedor.length<=0){
                            return;
                        }
                        $('#boxDevedor').addClass('collapsed-box').slideUp();
                        $('#boxNaoDevedor').removeClass('collapsed-box').slideDown();

                        $('.rm2').remove();
                        document.getElementById('tiluloMesPago').innerHTML = mes;
                        document.getElementById('MesAnoNaoDivida').innerHTML = 'Alunos Nao Devedores'+' '+mes+'-'+ano;
                        $('MesAnoNaoDivida').slideDown();
                        for(var k =0; k < rs.naodevedor.length; k++){
                            $('<tr class="rm2"><td>'+rs.naodevedor[k].nomeAluno+' '+ rs.naodevedor[k].apelido+'</td><td>'+rs.naodevedor[k].nomeTurma+'</td></tr>').hide().appendTo('#tabelaCorpoNaoDevedor').fadeIn(1000);
                        }
                    }
                })
            });


            /*Exportacao de tabela de devedores para excel e pdf*/
            $('#ExportExcelDevedor').click(function () {
                var rowCountDev = document.getElementById('tabelaCorpoDevedores').rows.length;
                if(rowCountDev <= 0){
                    $('#alertExport').slideDown();
                    return;
                }
                $('#tabelaDevedores').tableExport({type:'excel',escape:'false'});
            });

            $('#ExportPdfDevedor').click(function () {
                var rowCountDev = document.getElementById('tabelaCorpoDevedores').rows.length;
                if(rowCountDev <= 0){
                    $('#alertExport').slideDown();
                    return;
                }
                var mesDev =  document.getElementById('tiluloMesDivida').innerHTML;
                window.location ='/'+'exportDevedoresPDF?mes='+mesDev+'&ano='+ano+'&tabela=devedor';
            });

            /*Exportacao de tabela no devedores para excel e pdf*/
            $('#ExportExcelNaoDevedor').click(function () {
                var rowCountDev = document.getElementById('tabelaCorpoNaoDevedor').rows.length;
                if(rowCountDev <= 0){
                    $('#alertExport').slideDown();
                    return;
                }
                $('#tabelaNaoDevedores').tableExport({type:'excel',escape:'false'});
            });

            $('#ExportPdfNaoDevedor').click(function () {
                var rowCountDev = document.getElementById('tabelaCorpoNaoDevedor').rows.length;
                if(rowCountDev <= 0){
                    $('#alertExport').slideDown();
                    return;
                }
                var mesPago =  document.getElementById('tiluloMesPago').innerHTML;
                window.location ='/'+'exportDevedoresPDF?mes='+mesPago+'&ano='+ano+'&tabela=naodevedor';
            });
        });
    </script>
@endsection
