@extends('template.app')
@section('menu')
    <li>
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span >Inicio</span>
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
            <li class="active"><a href=""><i class="fa fa-pencil"></i> Registar Mensalidade</a></li>
            <li><a href="{{'/mensalidade'}}"><i class="fa fa-list"></i> Listar Mensalidades</a></li>
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
            <li><a ><i class="fa fa-money"></i>&nbsp; Mensalidade</a></li>
            <li class="active">Registar</li>
        </ol>
    </section>
    <section class="row">
        <div  class="col-md-4 col-sm-4 col-lg-4">
            <div style="display: flex; padding-top: 5px; margin-top: 1px">
                <a style="color: #3f729b; font-size: 33px; margin-top: -5px">
                    <i class="zmdi zmdi-account-circle prefix"></i>
                </a>
                <select id="inPutAluno" class="select2">
                    <option selected="selected">Selecine o aluno</option>
                    @foreach($alu  as $a)
                        <option id="{{$a->id}}" value="{{$a->nome.' '.$a->apelido}}">{{$a->nome.' '.$a->apelido}}</option>
                    @endforeach
                </select>
            </div>

            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                </div>
                <div class="widget-user-image">
                    <img id="idFotoAluno" class="img-circle" src="{!! asset('img/logo.jpg') !!}" alt="">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Cruso</h5>
                                <label class="description-text" id="textCurso">curso</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="description-block">
                                <h5 class="description-header">Valor por Mês</h5>
                                <label class="description-text" id="txtValorMensal">valor</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div style=" width: 100%; display: flex">
                <div class="form-group" style="width: 85%">
                    <select id="selectMes" class=" select2" multiple="multiple" data-placeholder="Selecione os meses a pagar" style="width: 100%;">
                    </select>
                </div>
                <div style="width: 15%; margin-left: 5px;">
                    <a class="btn btn-app">
                        <span style="font-size: 14px" class="badge bg-green" id="valorAPagar">0 Mt</span>
                        <i class="fa li_stack"></i> Valor a pagar
                    </a>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-money" style="color:#00b0ff;"></i>
                    <h3 class="box-title">Pagamento</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset>
                                <legend class="centered">Forma de pagamento</legend>
                                <input id="numerico" type="radio" checked name="tipoPagamento">
                                <label for="numerico" >Numerico</label>

                                {{--input responsavel em armazenar o valor de divida--}}
                                <input type="hidden" id="valorDivida">
                                {{--/*input responsavel por armazenar o valor a pagar de cada mensalidade*/--}}
                                <input type="hidden" id="valorMensal">
                                {{--input de vvalor a pagar no momento de pagamento--}}
                                <input type="hidden" id="valorP"  >

                                <input id="bank" type="radio" name="tipoPagamento">
                                <label class="pull-right" for="bank" >Deposito Bancário</label>
                            </fieldset>
                        </div>

                        <div id="carouPay" class="carousel slide col-sm-6" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" style="max-height: 100px">
                                <div class="item active">
                                    <div style="display:flex;">
                                        <div class="input-field" style="margin-right: 10px">
                                            <input type="number" id="valorPay">
                                            <label for="valorPay">Valor entrgue</label>
                                        </div>
                                        <div class="input-field">
                                            <input type="number" value="0.0" id="valorTrocos">
                                            <label for="valorTrocos">Trocos</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="input-field">
                                        <input id="numRecibo" type="text">
                                        <label for="numRecibo">Numero de Recibo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button class="btn btn-danger">Cancelar</button>
                        <button class="btn btn-success">&nbsp;&nbsp;&nbsp;Salvar&nbsp;&nbsp;</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="width: 100%;">
        <div class="row" >
            <h6 class="centered">
                <label class="label label-success">Pago</label>
                <label class="label label-warning">Adiantado</label>
                <label class="label label-danger">Não pago</label>
            </h6>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12" style="padding-top: 10px;  border-radius: 6px;  background-color:#f2f2f2;height: 60px; display: flex">
            <div class="inicio"><p style="color: #00b0ff" class="centered"><i class="fa fa-check fa-2x"></i></p></div>
            <div id="DivMeses" style=" width: 100%; height: 100px;  display: flex">
            </div>
            <div class="fim tooltipped" data-tooltip=""><p style="color: #171eff" class="centered"><i class="fa fa-star fa-2x"></i></p></div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
            var valorAPagar=0;

            $('#inPutAluno').on('change',function () {
                var op = $('option[value="'+$(this).val()+'"]');
                var idAluno = op.length ? op.attr('id'):'';
                if(idAluno === '' ||  $('#inPutAluno').val().length=== 0){
                    return;
                }
                var mesess='';
                $.ajax({
                    url: '/api/listarPorAluno',
                    type: 'POST',
                    data: {'idAluno':idAluno,'ano':2017},
                    success: function (rs) {
                        var valorMensal = rs.curso[0].valormensal;

                        document.getElementById('textCurso').innerHTML = rs.curso[0].nome;
                        document.getElementById('txtValorMensal').innerHTML =valorMensal+' Mt';
                        document.getElementById('valorMensal').value =valorMensal;
                        document.getElementById('idFotoAluno').src = '{{asset('img/upload/')}}'.concat('/' + rs.foto);
                        $('.mes').remove();
                        $('#actual').remove();
                        $('.ms').remove();

                        /*Inicio de raking de pagamento*/
                        var mesAdiantado ='';
                        var valorDivida=0;
                        for (var i=0; i < rs.mensal.length; i++){
                            if(rs.mensal[i].mesEstado ==='pago') {
                                $('#DivMeses').append(' <div class="mes"><label class="label label-success">' + rs.mensal[i].mes + '</label></div>');
                                mesess += rs.mensal[i].mes + ' ' + '<i style="color: #33de0c" class="fa fa-check"></i><br/>';
                                document.getElementById('valorDivida').value=0;
                            }else if (rs.mensal[i].mesEstado === 'adiantado'){
                                $('#DivMeses').append(' <div class="mes tooltippy"> <span style="color:#f39c12;" class="tooltippytext">Divida:'+' '+rs.mensal[i].divida+' '+'Mt</span> <label class="label label-warning">' + rs.mensal[i].mes + '</label></div>');
                                mesAdiantado = rs.mensal[i].mes;
                                mesess += rs.mensal[i].mes + ' ' + '<i style="color: #f39c12" class="fa fa-check"></i><br/>';
                                valorDivida = rs.mensal[i].divida;
                                document.getElementById('valorDivida').value=valorDivida;
                            }
                        }
                        $('#DivMeses').append('<div id="actual" class="tooltippy">' + '<p style="color:#3a5fff" class="centered"><i  class="fa fa-check fa-2x"></i></p><span class="tooltippytext">'+mesess+'</span> </div>');
                        $('#DivMeses').append('<div class="mes"><label class="label label-danger">'+rs.mesesNao[0].nome+'</label></div>');
                        /*Fimo do ranking de pagamento de mensalidades*/

                        /*Adicona mes adiantado no input dos mes a pagar*/
                        if(mesAdiantado !== '') {
                            $('#selectMes').append('<option  selected="selected"  class="ms" value=' + mesAdiantado + '>' + mesAdiantado + '</option>');
                            document.getElementById('valorAPagar').innerHTML = valorMensal+valorDivida +' '+'Mt';
                        }else{
                            document.getElementById('valorAPagar').innerHTML = valorMensal +' '+'Mt' ;
                        }
                        document.getElementById('valorP').value = valorMensal+valorDivida;
                        /*adiciona os restantes meses a pagar*/
                        $('#selectMes').append('<option  selected="selected"  class="ms" value=' + rs.mesesNao[0].nome + '>' + rs.mesesNao[0].nome + '</option>');
                        for(var m=1; m < rs.mesesNao.length; m++){
                            $('#DivMeses').append(' <div class="mes"><label class="label label-danger">'+rs.mesesNao[m].nome+'</label></div>');
                            $('#selectMes').append('<option  class="ms" value='+rs.mesesNao[m].nome+'>'+rs.mesesNao[m].nome+'</option>');
                        }
                    }
                });
            });

            $('#selectMes').change(function () {
                var valorMensal= parseFloat(document.getElementById('valorMensal').value);
                var numMes = $('#selectMes option:selected').length;
                var valrDivida = parseFloat(document.getElementById('valorDivida').value);
                if(numMes === 0){
                    document.getElementById('valorAPagar').innerHTML = 0+ ' ' + 'Mt';
                    document.getElementById('valorP').value = 0;
                }else if(numMes ===1 && valrDivida !== 0) {
                    document.getElementById('valorAPagar').innerHTML = valrDivida   + ' ' + 'Mt';
                    document.getElementById('valorP').value = valrDivida;
                }else if(numMes ===1 && valrDivida === 0){
                    document.getElementById('valorAPagar').innerHTML = valorMensal   + ' ' + 'Mt';
                    document.getElementById('valorP').value = valorMensal;
                } else if(numMes >1  && valrDivida !== 0 ){
                    document.getElementById('valorAPagar').innerHTML = (valorMensal* (numMes-1) +parseFloat(valrDivida))  + ' ' + 'Mt';
                    document.getElementById('valorP').value = (valorMensal* (numMes-1) + parseFloat(valrDivida));
                }else if(numMes >1  && valrDivida === 0 ){
                    document.getElementById('valorAPagar').innerHTML = (valorMensal* numMes)+ ' ' + 'Mt';
                    document.getElementById('valorP').value = (valorMensal*numMes);
                }
                document.getElementById('valorPay').value = 0;
                document.getElementById('valorTrocos').value = 0;
            });

            $('#valorPay').on('input',function () {
                var vl = $(this).val();
                var valorP = parseFloat(document.getElementById('valorP').value);
                if(vl-valorP >= 0){
                    document.getElementById('valorTrocos').value = (vl-valorP).toFixed(2);
                }else{
                    document.getElementById('valorTrocos').value ='';
                }
            });

            $('#bank').click(function () {
                $('#carouPay').carousel(1);
            });

            $('#numerico').click(function () {
                $('#carouPay').carousel(0);
            })
        })
    </script>
@endsection