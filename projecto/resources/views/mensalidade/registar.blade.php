@extends('template.app')
@section('menu')
    <li class="" href="">
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
            <li class="active"><a href=""><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href="{{'/mensalidade'}}"><i class="fa fa-list"></i> Listar</a></li>
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
            <div style="display: flex; padding-top: 5px; margin-top: 15px">
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
                    <p class="centered">Nome</p>
                </div>
                <div class="widget-user-image">
                    <img id="idFotoAluno" class="img-circle" src="{!! asset('img/logo.jpg') !!}" alt="">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="form-group">
                <label>Meses</label>
                <select id="selectMes" class="form-control select2" multiple="multiple" data-placeholder="Selecione os meses a pagar" style="width: 100%;">
                </select>
            </div>
        </div>
        <fieldset style="width: 100%; background-color: #f5f5f5">
            <legend class="centered">
                Raking de Pagamento
            </legend>
            <div class="row" >
               <h6 class="centered">
                   <label class="label label-info">Pago</label>
                   <label class="label label-warning">Adiantado</label>
                   <label class="label label-primary">Não pago</label>
               </h6>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12" style="padding-top: 10px;  border-radius: 6px;  background-color:#f2f2f2;height: 60px; display: flex">
                <div class="inicio"><p style="color: #00b0ff" class="centered"><i class="fa fa-check fa-2x"></i></p></div>
                <div id="DivMeses" style=" width: 100%; height: 100px;  display: flex">
                </div>
                <div class="fim tooltipped" data-tooltip=""><p style="color: #171eff" class="centered"><i class="fa fa-star fa-2x"></i></p></div>
            </div>
        </fieldset>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            {{--var mesInicial = {!! json_encode($mesBegin) !!}--}}

            $('#inPutAluno').on('change',function () {

//                var ano = document.getElementById('selectAno').value;
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
                        document.getElementById('idFotoAluno').src = '{{asset('img/upload/')}}'.concat('/' + rs.foto);
                        $('.mes').remove();
                        $('#actual').remove();
                        $('.ms').remove();

                        for (var i=0; i < rs.mensal.length; i++){
                            if(rs.mensal[i].mesEstado =='pago') {
                                $('#DivMeses').append(' <div class="mes mes-pago"><label class="label label-info">' + rs.mensal[i].mes + '</label></div>');
                                mesess += rs.mensal[i].mes + ' ' + '<i style="color: #5bc0de" class="fa fa-check"></i><br/>';
                            }else if (rs.mensal[i].mesEstado == 'adiantado'){
                                $('#DivMeses').append(' <div class="mes mes-pago"><label class="label label-warning">' + rs.mensal[i].mes + '</label></div>');
                                mesess += rs.mensal[i].mes + ' ' + '<i style="color: #f39c12" class="fa fa-check"></i><br/>';
                            }
                        }
                        $('#DivMeses').append('<div id="actual" class="tooltippy" data-tooltip="fader" >' +
                            '<p style="color: #3a5fff" class="centered"><i  class="fa fa-check fa-2x"></i></p><span class="tooltippytext">'+mesess+'</span> </div>');
                        for(var m=0; m < rs.mesesNao.length; m++){
                            $('#DivMeses').append(' <div class="mes mes-nao-pago"><label class="label label-primary">'+rs.mesesNao[m].nome+'</label></div>');
                            $('#selectMes').append('<option class="ms" value='+rs.mesesNao[m].nome+'>'+rs.mesesNao[m].nome+'</option>');
                        }
                    }
                })
            });

            $('#selectMes').change(function () {

                var l = $(this).val();


            });


            /*Disciplinas*/
            $('.dropdown-button').dropdown({
                inDuration:30,
                outDuration: 225,
                constrainWidth: false,
                hover: true,
                gutter:0,
                belowOrigin: false,
                alignment: 'left',
                stopPropagation: false
            });
//
//            $('.dropdown-button').dropdown('open');
//            $('.dropdown-button').dropdown('close');
        })
    </script>
@endsection