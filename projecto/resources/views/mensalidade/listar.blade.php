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
        <div class="nav-tabs-custom" style="background-color: #f2f2f2">
            <ul class="nav nav-tabs ">
                <li class="pull-left active"><a data-slide-to="0" href="#carousellDiv" data-toggle="tab"><i class="fa fa-money"></i>&nbsp;Todas Mensalidades</a></li>
                <li><a data-slide-to="1" href="#carousellDiv" data-toggle="tab"><i class="fa fa-users"></i>&nbsp;Por Aluno</a></li>
                <li style="width: 100px;" class="tooltipped" data-tooltip="Selecione o Ano">
                    <div >
                        <a class="myIcon"><i class="zmdi zmdi-calendar"></i></a>
                        <select class="material-control2"  id="selectAno">
                            {{--@foreach($anos as $ano)--}}
                                {{--<option value="{{$ano}}">{{$ano}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Morris chart - Sales -->
                <div id="carousellDiv" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div  class="carousel-inner">
                        <div id="" class="item active">

                            <section class="item col-sm-7">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <table class="table  table-striped" id="tabela1">
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
                                                        <td><a class="btnn btn-primary"><i class="zmdi zmdi-library"></i>&nbsp;Mais </a></td>
                                                    </tr>
                                                @endforeach

                                                @foreach($mesesAPagar as $ot)
                                                    <tr>
                                                        <td>{{$ot}}</td>
                                                        <td><a data-mes="{{$ot}}" class="btn btn-info btn-nao-devedor"><i class="fa fa-check"></i>&nbsp;{{\App\Mensalidade::query()->where('mes',$ot)->count()}}</a></td>
                                                        <td><a data-mes="{{$ot}}" class="btn btn-danger btn-devedor"><i class="zmdi zmdi-close"></i>&nbsp;{{\App\Aluno::all()->count()-\App\Mensalidade::query()->where('mes',$ot)->count()}}</a></td>
                                                        <td><a class="btnn btn-primary"><i class="zmdi zmdi-library"></i>&nbsp;Mais </a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>

                            <section class="col-lg-5 ">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-users"></i>&nbsp;Devedores</h3>
                                        <h3 class="box-title pull-right"><i class="fa fa-calendar-o"></i>&nbsp;<label style="min-width: 60px; font-size: 14px" id="tiluloMes"></label></h3>
                                    </div>
                                    <div class="box-body">

                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-primary">Exportar</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Excel</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Pdf</a></li>
                                            </ul>
                                        </div>

                                        <table class="striped" id="tabelaDevedores">
                                            <thead>
                                                <tr>
                                                    <th>Aluno</th>
                                                    <th>Turma</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabelaDivida">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="item row">
                            <div class="col-md-4 col-sm-4 col-lg-4 ">
                                <div class="input-field">
                                    <i class="zmdi zmdi-account-circle prefix"></i>
                                    <input id="selectAluno" placeholder="Aluno"  type="text" list="listaAluno">
                                    <datalist id="listaAluno">
                                        {{--@foreach($alunos  as $ms)--}}
                                            {{--<option data-costa="" id="{{$ms->id}}" value="{{$ms->nome}}">{{$ms->nome}}</option>--}}
                                        {{--@endforeach--}}
                                    </datalist>
                                </div>
                                <div class=" alunuDetalhes row">
                                    <div class="col-md-12 col-sm-12 col-lg-12 box-profile"  >
                                        <img id="idFoto" src="{!! asset('img/logo.jpg')!!}" class=" profile-user-img img-responsive img-circle" >
                                        <p class="centered">So Faculdade</p>
                                        <input id="ok" value="">
                                        <button class="btnn" onclick="lolo()"> cansado</button>
                                    </div>
                                </div>

                                <div class="col-md-122 col-sm-12 col-log-12">
                                    <div class="progress progress-striped ">
                                        <div id="barWidth" class="progress-bar tooltipped"  role="progressbar"   aria-valuemin="0" aria-valuemax="100" data-tooltip="% de Pagamento Feito">
                                            <span class="centered" style="font-size: 13px;"  id="percPago"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" >
                                    <div class="col-md-4 col-sm-4 col-log-4 ">
                                        <div class="sm-st tooltipped" data-tooltip="Valor Pago">
                                            <p class="centered">
                                                <span class="sm-st-icon st-blue"><i class="fa fa-money"></i></span>
                                            </p>
                                            <div class="sm-st-info centered">
                                                <p id="valorPago">0</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-lg-4 ">
                                        <div class="sm-st  tooltipped"  data-tooltip="Divida">
                                            <p class="centered">
                                                <span class="sm-st-icon st-red"><i class="fa fa-money"></i></span>
                                            </p>
                                            <div class="sm-st-info centered">
                                                <p id="valorDivida">0</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-lg-4 ">
                                        <div class="sm-st tooltipped" data-tooltip="Total a Pagar" >
                                            <p class="centered">
                                                <span class="sm-st-icon st-violet"><i class="fa fa-money"></i></span>
                                            </p>
                                            <div class="sm-st-info centered">
                                                <p>5600</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-lg-8 " style="padding-top: 15px;">



                                <form id="frm">
                                    <input type="text" id="txt">
                                    <input type="submit">
                                </form>
                            </div>
                        </div>

                        <div class="item">
                            <!--Mes-->
                            <div class="col-md-3 col-sm-3 col-lg-3">
                                <div class="group-material">
                                    <a class="icon"><i class="zmdi zmdi-calendar"></i></a>
                                    <select class="material-control tooltipped" data-tooltip="Mês" id="selectMes">
                                        <option value="" disabled="" selected=""  >Selecione Mês</option>
                                        {{--@foreach($meses as $mes)--}}
                                            {{--<option value="{{$mes}}">{{$mes}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-8 col-lg-8" >
                                <table class="striped" id="IDtabela2">
                                    <thead>
                                    <tr>
                                        <th data-field="">Aluno</th>
                                        <th data-field="">Data de Pagamento</th>
                                        <th data-field="">Estado</th>
                                        <th data-field="">Valor Pag<i class="zmdi zmdi-money"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabela2">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

//            $.ajax({
//                url: '/api/getMesAPagar',
//                type: 'POST',
//                success: function (rs) {
//                    var array = rs.split(' ');
//                    for(var i=array.length-2; i>=0; i--){
//                        $('#tabela').append('<tr> <td>'+array[i]+'</td> <td><a data-mes="" class="btn btn-default"><i class="fa fa-check"></i>&nbsp;0</a></td> <td><a  class="btn btn-default"><i class="zmdi zmdi-close"></i>&nbsp;0</a></td> <td><a class="btnn btn-default"><i class="zmdi zmdi-library"></i>&nbsp;Ainda </a></td> </tr>');
//                    }
//                }
//            });

            $('.btn-devedor').on('click', function(){
                var mes= $(this).attr('data-mes');
                $.ajax({
                    url: '/api/getDevedoresMes',
                    type: 'POST',
                    data: 'mes=' +mes,
                    success: function (rs) {
                        if(rs.ids.length<=0){
                            return;
                        }
                        $('.rm').remove();
                        document.getElementById('tiluloMes').innerHTML = mes;
                        for(var k =0; k < rs.ids.length; k++){
                            $('<tr class="rm"><td>'+rs.ids[k].nomeAluno+'</td><td>'+rs.ids[k].nomeTurma+'</td></tr>').hide().appendTo('#tabelaDivida').fadeIn(1000);
                        }
                    }
                })
            });
//            var rowCount = document.getElementById('IDtabela1').rows.length - 1;
//            alert(meses[rowCount]);





            //
////            var d=0;
//            var f = 'Fevereiro';var j=0; var t;
//                $.ajax({
//                    url: '/api/listarTodasMensalidades',
//                    type: 'POST',
//                    success: function (rs) {
//                        for ( var j=0; j < rs.mensalidade.length; j++) {
////                            alert(rs.mensalidade[j]);
////                            oka();
//
////                            $.ajax({
////                                url: '/api/devedoresEnao',
////                                type: 'POST',
////                                data: 'mes='+rs.mensalidade[j],
////
////                                success: function (dev) {
////                                    t = dev.naoDevedores;
//////                                    alert('ok');
//////                                for (var j = 0; j < rs.mensalidade.length; j++) {
////
//////                                    $('#tabela').append(" <tr class='tr'><td>" + rs.mensalidade[j] + "</td> <td></td><td></td><td><button class='btnn'>Detalhes</button></td>")
//////                                }
////                                }
////                            });
////                            alert(t);
////                            $('#tabela').append(" <tr class='tr'><td>" + rs.mensalidade[j] + "</td> <td>"+rs.dev+"</td><td></td><td><button class='btnn'>Detalhes</button></td>")
//
//                        }
//                    }
//                });

//                function oka() {
//                    $.ajax({
//                        url: '/api/devedoresEnao',
//                        type: 'POST',
//                        data: 'mes='+f,
//                        success: function (dev) {
//                            alert('ok');
////                                for (var j = 0; j < rs.mensalidade.length; j++) {
//
////                            $('#tabela').append(" <tr class='tr'><td>" + rs.mensalidade[j] + "</td> <td></td><td></td><td><button class='btnn'>Detalhes</button></td>")
////                                }
//                        }
//                    });
//                }
////               alert( console.log(d));





//            alert(d);
//            $.ajax({
//                url: '/api/listarTodasMensalidades',
//                type: 'POST',
//                success: function (rs) {
//                    for (var j = 0; j < rs.mensalidade.length; j++) {
//
//                        $('#tabela').append(" <tr class='tr'><td>" + rs.mensalidade[j] + "</td> <td></td><td></td><td><button class='btnn'>Detalhes</button></td>")
//                    }
//                }
//
//            });


        });


                        /*Inicio Metodos de Listar por alunos*/

            {{--function getCor(){--}}
                {{--var rgb = [];--}}
                {{--for(var i = 0; i < 3; i++)--}}
                    {{--rgb.push(Math.floor(Math.random() * 255));--}}
                {{--return 'rgb('+ rgb.join(',') +')';--}}
            {{--}--}}

            {{--var ano = document.getElementById('selectAno').value;--}}
            {{--$('#selectAno').change(function () {--}}
                {{--ano = $(this).val()--}}
            {{--});--}}

            {{--for (var j = 0; j < meses.length; j++) {--}}
                {{--$('#tabela').append(" <tr class='tr'><td>" + meses[j] + "</td> <td>--------------------------</td><td>--------</td><td>---------</td>");--}}
            {{--}--}}

            {{--var numAl = JSON.parse("{{json_encode($numAluno)}}");--}}
            {{--for( var k = 0; k< numAl; k++){--}}
                {{--$('#tabela2').append(" <tr class='tr2'><td>" + 'Aluno'+k+1 + "</td> <td>--------------------------</td><td>--------</td><td>---------</td>");--}}
            {{--}--}}

            {{--function getIdade(data) {--}}
                {{--var dt = new Date(data).getFullYear();--}}
                {{--var dh = new Date().getFullYear();--}}
                {{--return dh - dt;--}}
            {{--}--}}

            {{--$('#selectAluno').on('input',function () {--}}

                {{--var op = $('option[value="'+$(this).val()+'"]');--}}
                {{--var idAluno = op.length ? op.attr('id'):'';--}}
                {{--if(idAluno === '' ||  $('#selectAluno').val().length=== 0){--}}
                    {{--return;--}}
                {{--}--}}
                {{--$.ajax({--}}
                    {{--url: '/api/listarPorAluno',--}}
                    {{--type: 'POST',--}}
                    {{--data: {'idAluno':idAluno,'ano':ano},--}}
                    {{--success: function (rs) {--}}
                        {{--document.getElementById('idFoto').src = '{{asset('img/upload/')}}'.concat('/' + rs.aluno.foto);--}}
                        {{--document.getElementById('apelido').innerHTML = rs.aluno.apelido;--}}
                        {{--document.getElementById('sexo').innerHTML = rs.aluno.sexo;--}}
                        {{--document.getElementById('idade').innerHTML = getIdade(rs.aluno.dataNasc) + ' Anos';--}}

{{--//                            document.getElementById('apelido').style.width = k+'%';--}}
{{--//                            document.getElementById('sexo').style.width = k+'%';--}}
{{--//                            document.getElementById('idade').style.width = k+'%';--}}
{{--//--}}
                        {{--var corbk = getCor();--}}
                        {{--document.getElementById('idade').style.backgroundColor = corbk;--}}
                        {{--document.getElementById('sexo').style.backgroundColor = corbk;--}}
                        {{--document.getElementById('apelido').style.backgroundColor = corbk;--}}

                        {{--/*prenche a tabela*/--}}
                        {{--var valorPago = 0;--}}
                        {{--$('.tr').remove();--}}
                        {{--for (var j = 0; j < rs.mensal.length; j++) {--}}
                            {{--$('#tabela').append(" <tr class='tr'><td>" + rs.mensal[j].mes + "</td> <td>" + rs.mensal[j].dataP + "</td><td>" + rs.mensal[j].estado + "</td><td>" + rs.mensal[j].valor.toFixed(2) + "</td>");--}}
                            {{--valorPago += rs.mensal[j].valor;--}}
                        {{--}--}}

                        {{--var prc = (valorPago * 100)/5600;--}}
                        {{--document.getElementById('valorPago').innerHTML = valorPago;--}}
                        {{--document.getElementById('valorDivida').innerHTML = 5600-valorPago;--}}
                        {{--document.getElementById('percPago').innerHTML = prc.toFixed(2)+'%';--}}
                        {{--document.getElementById('barWidth').style.width = prc+'%';--}}

                        {{--/*Adiciona os meses em faltam*/--}}
                        {{--var rowCount = document.getElementById('IDtabela1').rows.length - 1;--}}
                        {{--for (var f = rowCount; f < meses.length; f++) {--}}
                            {{--$('#tabela').append(" <tr class='tr'><td>" + meses[f] + "</td> <td>--------------------------</td><td>Nao pago</td><td>0.00</td>");--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
            {{--/*Fim Metodos de Listar por alunos*/--}}
            {{--/*Inicio Metodos de Listar por Mes*/--}}

            {{--$('#selectMes').change(function lev() {--}}

                {{--if(ano === 0){--}}
                    {{--alert('Selecione o Ano');--}}
                    {{--return;--}}
                {{--}--}}
                {{--var mes = $(this).val();--}}
                {{--$.ajax({--}}
                    {{--url: 'api/listarPorMes',--}}
                    {{--type: 'POST',--}}
                    {{--data: {'ano':ano, 'mes':mes},--}}
                    {{--success: function (rs) {--}}
                        {{--$('.tr2').remove();--}}
                        {{--for (var j = 0; j < rs.mensal.length; j++) {--}}
                            {{--$('#tabela2').append(" <tr class='tr2'><td>" + rs.mensal[j].nome +' '+ rs.mensal[j].apelido +  "</td> <td>" + rs.mensal[j].dataP + "</td><td>" + rs.mensal[j].estado + "</td><td>" + rs.mensal[j].valor + "</td></tr>");--}}
                        {{--}--}}
                    {{--}--}}
                {{--})--}}

            {{--});--}}

{{--//            $('.materialboxed').materialbox();--}}
{{--//            $('.carousel').carousel();--}}
//        });
    </script>

@endsection

