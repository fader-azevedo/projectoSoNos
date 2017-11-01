@extends('template.app')
@section('menu')
    <li class="" href="">
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span >Inicio</span>
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
            <li><a href=""><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href="{{url('/mensalidade')}}"><i class="fa fa-list"></i> Listar</a></li>
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

    <h5 class="center-align tooltippy">
        <span class=""><i class="fa fa-pencil"></i></span>
        Registar Mensalidade
        <span class="tooltippytext">tooltippy Fader</span>
    </h5>

    <section class="row"  id="DivRegistarMensalidade">
        <div class="col-md-4 col-sm-4 col-lg-4 ">
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
                    <img id="idFoto" src="{!! asset('img/logo.jpg')!!}" class="materialboxed profile-user-img img-responsive img-circle" >
                </div>
            </div>

            <div class="alunuDetalhes row">
                <a class="dropdown-button btnn" data-activates="dropdown1">Disciplinas</a>
                <ul id="dropdown1" class="dropdown-content">
                </ul>
            </div>
        </div>
        <div  class="col-md-3 col-sm-3 col-lg-3" >
            <div class="input-field" style="background-color: #ffffff;">
                <i class="zmdi zmdi-format-list-numbered prefix"></i>
                <input id="numb" type="number" min="1" >
                <label for="numb">Meses</label>
            </div>

            <a class="myIcon"><i class="zmdi zmdi-calendar"></i></a>
            <ul class="mesesList">
            </ul>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="form-group">
                <select id="Months" class="form-control select2" multiple="multiple" data-placeholder="Selecione os Meses">
                    <option>um</option>
                    <option>um</option>
                    <option>dos</option>
                    <option>um</option>
                </select>
            </div>

            <div class="">
                <label>Minimal</label>
                <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
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
            $('.select2').select2();

            for(var l = 0; l < meses.length; l++){
                $('#DivMeses').append('<div class="mesesNaoPagos"></div>');
            }

            var contaMeses;
            var numMesesqFaltam =0;
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
                        $('.li').remove();
                        $('.li2').remove();

                        for (var i=0; i< rs.mensal.length; i++){
                            $('#DivMeses').append(' <div class="mesesPagos "></div>');
                            mesess +=rs.mensal[i].mes+' '+'<i style="color: #5bc0de" class="fa fa-check"></i><br/>';
                            contaMeses +=1;
                        }

//
//                        $('#DivMeses').append('<div id="actual" class="tooltippy" data-tooltip="fader" >' +
//                            '<p style="color: #3a5fff" class="centered"><i  class="fa fa-check fa-2x"></i></p><span class="tooltippytext">'+mesess+'</span> </div>');
//                        for(var k = contaMeses; k < meses.length; k++){
//                            $('#DivMeses').append(' <div class="mesesNaoPagos"></div>');
//                           /*Lista Meses a pagar*/
//                            $('#Months').append('<option>' + meses[k] + '</option>');
//                            numMesesqFaltam +=1;
//                        }
//                        for (var y=1;y<contaMeses+1; y++ ){
////                            document.getElementById('Mes'+y.toString()).setAttribute('disabled','disabled');
////                            document.getElementById('Mes'+y.toString()).append('<i class=""></i>');
//                        }

                        /*Buscar dados de inscricao*/
                        for(var q=0; q < rs.inscricao.length;q++){
//                            alert(rs.inscricao[q].valorMensal);
                            $('#dropdown1').append('<li class="li"> <a>'+rs.inscricao[q].nome+'</a> </li>');
                        }

//                        document.getElementById('numb').setAttribute('max',numMesesqFaltam);
//                        document.getElementById('numb').setAttribute('min','1');
//                        document.getElementById('numb').setAttribute('value','1');
//                        $('.mesesList').append('<li class="li2"><a class="centered">'+meses[contaMeses]+'</a></li>');

                    }
                })
            });


//            $('#numb').change(function () {
//                var name = document.getElementById('selectAluno2').value;
//                var valu = $(this).val();
//                if(valu > numMesesqFaltam || name === '') {
//                    return;
//                }
//                $('.li2').remove();
//                for( var w= 0;w < valu;w++){
//                   $('.mesesList').append('<li class="li2"><a class="centered">'+meses[contaMeses+w]+'</a></li>');
//               }
//            });

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