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
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a data-slide-to="0" href="#carousellDiv" data-toggle="tab">Por Aluno</a></li>
                <li><a data-slide-to="1" href="#carousellDiv" data-toggle="tab">Por Mês</a></li>
                <li style="font-size: 30px" class="pull-left header"><i class="fa fa-money"></i> Mensalidades</li>
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
            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div id="carousellDiv" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div  class="carousel-inner">
                        <div class="item active row">
                            <div class="col-md-4 col-sm-4 col-lg-4 ">
                                <div class="input-field">
                                    <i class="zmdi zmdi-account-circle prefix"></i>
                                    <input id="selectAluno" placeholder="Aluno"  type="text" list="listaAluno">
                                    <datalist id="listaAluno">
                                        @foreach($alunos  as $ms)
                                            <option data-costa="" id="{{$ms->id}}" value="{{$ms->nome}}">{{$ms->nome}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class=" alunuDetalhes row">
                                    <div class="col-md-12 col-sm-12 col-lg-12 box-profile"  >
                                        <img id="idFoto" src="{!! asset('img/logo.jpg')!!}" class=" profile-user-img img-responsive img-circle" >
                                        {{--<p class="centered">So Faculdade</p>--}}
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
                                <table class="striped" id="IDtabela1">
                                    <thead>
                                    <tr>
                                        <th data-field="id">Mês</th>
                                        <th data-field="price">Data de Pagamento</th>
                                        <th data-field="name">Estado</th>
                                        <th data-field="price">Valor Pag<i class="zmdi zmdi-money"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabela">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="item">
                            <!--Mes-->
                            <div class="col-md-3 col-sm-3 col-lg-3" style="padding-top: 15px" >
                                <div class="group-material">
                                    <a class="icon"><i class="zmdi zmdi-calendar"></i></a>
                                    <select class="material-control tooltipped" data-tooltip="Mês" id="selectMes">
                                        <option value="" disabled="" selected=""  >Selecione Mês</option>
                                        @foreach($meses as $mes)
                                            <option value="{{$mes}}">{{$mes}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-8 col-lg-8" style="padding-top: 15px;">
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

    {{--</div>--}}

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            /*Inicio Metodos de Listar por alunos*/

            function getCor(){
                var rgb = [];
                for(var i = 0; i < 3; i++)
                    rgb.push(Math.floor(Math.random() * 255));
                return 'rgb('+ rgb.join(',') +')';
            }

            var ano = document.getElementById('selectAno').value;
            $('#selectAno').change(function () {
                ano = $(this).val()
            });

            for (var j = 0; j < meses.length; j++) {
                $('#tabela').append(" <tr class='tr'><td>" + meses[j] + "</td> <td>--------------------------</td><td>--------</td><td>---------</td>");
            }

            var numAl = JSON.parse("{{json_encode($numAluno)}}");
            for( var k = 0; k< numAl; k++){
                $('#tabela2').append(" <tr class='tr2'><td>" + 'Aluno'+k+1 + "</td> <td>--------------------------</td><td>--------</td><td>---------</td>");
            }

            function getIdade(data) {
                var dt = new Date(data).getFullYear();
                var dh = new Date().getFullYear();
                return dh - dt;
            }

            $('#selectAluno').on('input',function () {

                var op = $('option[value="'+$(this).val()+'"]');
                var idAluno = op.length ? op.attr('id'):'';
                if(idAluno === '' ||  $('#selectAluno').val().length=== 0){
                    return;
                }
                $.ajax({
                    url: '/api/listarPorAluno',
                    type: 'POST',
                    data: {'idAluno':idAluno,'ano':ano},
                    success: function (rs) {
                        document.getElementById('idFoto').src = '{{asset('img/upload/')}}'.concat('/' + rs.aluno.foto);
                        {{--document.getElementById('apelido').innerHTML = rs.aluno.apelido;--}}
                        {{--document.getElementById('sexo').innerHTML = rs.aluno.sexo;--}}
                        {{--document.getElementById('idade').innerHTML = getIdade(rs.aluno.dataNasc) + ' Anos';--}}

//                            document.getElementById('apelido').style.width = k+'%';
//                            document.getElementById('sexo').style.width = k+'%';
//                            document.getElementById('idade').style.width = k+'%';
//
                        {{--var corbk = getCor();--}}
                        {{--document.getElementById('idade').style.backgroundColor = corbk;--}}
                        {{--document.getElementById('sexo').style.backgroundColor = corbk;--}}
                        {{--document.getElementById('apelido').style.backgroundColor = corbk;--}}

                        /*prenche a tabela*/
                        var valorPago = 0;
                        $('.tr').remove();
                        for (var j = 0; j < rs.mensal.length; j++) {
                            $('#tabela').append(" <tr class='tr'><td>" + rs.mensal[j].mes + "</td> <td>" + rs.mensal[j].dataP + "</td><td>" + rs.mensal[j].estado + "</td><td>" + rs.mensal[j].valor.toFixed(2) + "</td>");
                            valorPago += rs.mensal[j].valor;
                        }

                        var prc = (valorPago * 100)/5600;
                        document.getElementById('valorPago').innerHTML = valorPago;
                        document.getElementById('valorDivida').innerHTML = 5600-valorPago;
                        document.getElementById('percPago').innerHTML = prc.toFixed(2)+'%';
                        document.getElementById('barWidth').style.width = prc+'%';

                        /*Adiciona os meses em faltam*/
                        var rowCount = document.getElementById('IDtabela1').rows.length - 1;
                        for (var f = rowCount; f < meses.length; f++) {
                            $('#tabela').append(" <tr class='tr'><td>" + meses[f] + "</td> <td>--------------------------</td><td>Nao pago</td><td>0.00</td>");
                        }
                    }
                });
            });
            /*Fim Metodos de Listar por alunos*/
            /*Inicio Metodos de Listar por Mes*/

            $('#selectMes').change(function lev() {

                if(ano === 0){
                    alert('Selecione o Ano');
                    return;
                }
                var mes = $(this).val();
                $.ajax({
                    url: 'api/listarPorMes',
                    type: 'POST',
                    data: {'ano':ano, 'mes':mes},
                    success: function (rs) {
                        $('.tr2').remove();
                        for (var j = 0; j < rs.mensal.length; j++) {
                            $('#tabela2').append(" <tr class='tr2'><td>" + rs.mensal[j].nome +' '+ rs.mensal[j].apelido +  "</td> <td>" + rs.mensal[j].dataP + "</td><td>" + rs.mensal[j].estado + "</td><td>" + rs.mensal[j].valor + "</td></tr>");
                        }
                    }
                })

            });

//            $('.materialboxed').materialbox();
//            $('.carousel').carousel();
        });
    </script>

@endsection

