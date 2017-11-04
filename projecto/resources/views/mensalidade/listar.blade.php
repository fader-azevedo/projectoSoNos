@extends('template.app')
@section('menu')
    <li>
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>

    <li class="treeview active">
        <a href="#">
            <i class="fa fa-money"></i>
            <span>Mensalidades</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{'/mensalidade/registar'}}"><i class="fa fa-pencil"></i> Registar Mensalidade</a></li>
            <li class="active"><a href=""><i class="fa fa-list"></i> Listar Mensalidade</a></li>
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
            <li><a href="#"><i class="fa fa-money"></i>&nbsp; Mensalidade</a></li>
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
                    <div class="item active ">
                        <section class="col-sm-7 col-md-7 col-lg-7" style="padding-top: 14px">
                            <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#ModalDetalhes">
                                Launch Info Modal
                            </button>

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
                                            <td class="">{{$ms->mes}}</td>
                                            <td><a data-mes="{{$ms->mes}}" class="btn btn-info btn-nao-devedor"><i class="fa fa-check"></i>&nbsp;{{\App\Mensalidade::query()->where('mes',$ms->mes)->count()}}</a></td>
                                            <td><a data-mes="{{$ms->mes}}" class="btn btn-danger btn-devedor"><i class="zmdi zmdi-close"></i>&nbsp;{{\App\Aluno::all()->count()-\App\Mensalidade::query()->where('mes',$ms->mes)->count()}}</a></td>
                                            <td><a class="btn btn-primary btn-detalhes" data-code="1"><i class="zmdi zmdi-library"></i>&nbsp;Mais detalhes </a></td>
                                        </tr>
                                    @endforeach

                                    @foreach($mesesAPagar as $ot)
                                        <tr>
                                            <td>{{$ot}}</td>
                                            <td><a disabled="disabled" class="btn btn-default"><i class="fa fa-check"></i>&nbsp;0</a></td>
                                            <td><a disabled="disabled" class="btn btn-default"><i class="zmdi zmdi-close"></i>&nbsp;0&nbsp;</a></td>
                                            <td><a disabled="disabled" class="btn btn-default"><i class="zmdi zmdi-library"></i>&nbsp;&nbsp;Sem registo&nbsp;&nbsp;</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                        <section class=" col-sm-5 col-md-5 col-lg-5 ">
                            {{--tabela Nao Devedores--}}
                            <div class="box box-info" id="boxNaoDevedor" style="position: relative">
                                <div class="box-header with-border">
                                    <h3 style="color: #00c0ef" class="box-title"><i class="fa fa-users"></i>&nbsp;Alunos não Devedores</h3>

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
                                                <th style="width: 40%">Nome</th>
                                                <th style="width: 30%">Turma</th>
                                                <th style="width: 30%">Curso</th>
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
                                                <th style="width: 35%">Nome</th>
                                                <th style="width: 20%">Turma</th>
                                                <th style="width: 25%">Curso</th>
                                                <th style="width: 20%">Valor</th>
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
                        @include('mensalidade.aluno')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalDetalhes" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mes</h4>
                </div>
                <div class="modal-body" id="ModalDetalhesCorpo">
                    <p>One fine body&hellip;</p>
                    <table border="2" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Turma</th>
                            <th>Curso</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td style="height: 200px">Devedores</td>
                            <td>
                                turma <br/>
                                turma2<br/>
                                turma3<br/>
                                turma <br/>
                                turma2<br/>
                                turma3<br/>turma <br/>
                                turma2<br/>
                                turma3<br/>
                            </td>
                            <td>curso 2</td>
                        </tr>

                        <tr>
                            <td style="height: 200px">Nao Devedores</td>
                            <td>turma</td>
                            <td>curso 4</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
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
                $('#boxNaoDevedor').addClass('collapsed-box').slideUp();
                $('#boxDevedor').removeClass('collapsed-box').slideDown();

                var mes= $(this).attr('data-mes');
                $.ajax({
                    url: '/api/getDevedoresMes',
                    type: 'POST',
                    data: {'mes': mes, 'ano': ano, 'tabela':'devedor'},
                    success: function (rs) {
                        if(rs.devedor.length<=0){
                            return;
                        }

                        $('.rm').remove();
                        document.getElementById('tiluloMesDivida').innerHTML = mes;
                        document.getElementById('MesAnoDivida').innerHTML = 'Alunos Devedores'+' '+mes+'-'+ano;
                        $('MesAnoDivida').slideDown();
                        for(var k =0; k < rs.devedor.length; k++){
                            $('<tr class="rm"><td>'+rs.devedor[k].nomeAluno+' '+ rs.devedor[k].apelido+'</td><td>'+rs.devedor[k].turma+'</td><td>'+rs.devedor[k].curso+'</td><td>'+(rs.devedor[k].divida).toFixed(2)+' Mt'+'</td></tr>').hide().appendTo('#tabelaCorpoDevedores').fadeIn(1000);
                        }
                    }
                })
            });
            /*lista todos nao devedores*/
            $('.btn-nao-devedor').on('click', function () {

                $('#boxDevedor').addClass('collapsed-box').slideUp();
                $('#boxNaoDevedor').removeClass('collapsed-box').slideDown();

                var mes= $(this).attr('data-mes');
                $.ajax({
                    url: '/api/getDevedoresMes',
                    type: 'POST',
                    data: {'mes': mes, 'ano': ano, 'tabela':'naodevedor'},
                    success: function (rs) {
                        if(rs.naodevedor.length<=0){
                            return;
                        }

                        $('.rm2').remove();
                        document.getElementById('tiluloMesPago').innerHTML = mes;
                        document.getElementById('MesAnoNaoDivida').innerHTML = 'Alunos Nao Devedores'+' '+mes+'-'+ano;
                        $('MesAnoNaoDivida').slideDown();
                        for(var k =0; k < rs.naodevedor.length; k++){
                            $('<tr class="rm2"><td>'+rs.naodevedor[k].nomeAluno+' '+ rs.naodevedor[k].apelido+'</td><td>'+rs.naodevedor[k].turma+'</td><td>'+rs.naodevedor[k].curso+'</td></tr>').hide().appendTo('#tabelaCorpoNaoDevedor').fadeIn(1000);
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
                window.location ='/exportDevedoresPDF?mes='+mesPago+'&ano='+ano+'&tabela=naodevedor';
            });
            
            
            /*Mais detalhes*/
            $('.btn-detalhes').click(function () {
                var code =$(this).attr('data-code');
                $.ajax({
                    url:'/api/getModal',
                    type: 'POST',
                    data: 'code='+code,
                    success:function(data){
                        $('#ModalDetalhesCorpo').html(data);
                        $('#ModalDetalhes').modal({
                            show: true,
                            backdrop: "static"
                        });
                    }
                });
                return false;
            })

        });
    </script>
@endsection
