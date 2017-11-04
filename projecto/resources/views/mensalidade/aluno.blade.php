<div class="col-md-4 col-sm-4 col-lg-4">

    <div style="display: flex; padding-top: 5px; margin-top: 15px; width: 100%">
        <a style="color: #3f729b; font-size: 33px; margin-top: -5px">
            <i class="zmdi zmdi-account-circle prefix"></i>
        </a>
        <select id="inPutAluno" class="select2" style="width: 1000px">
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
                        <div class="sm-st tooltipped" data-tooltip="Valor Pago">
                            <label class="label label-success">Pago</label>
                            <p class="centered">
                                <span class="sm-st-icon st-green"><i class="fa fa-money"></i></span>
                            </p>
                            <div class="sm-st-info centered">
                                <p id="valorPago">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <div class="sm-st  tooltipped"  data-tooltip="Divida">
                            <label class="label label-danger">Dívida</label>
                            <p class="centered">
                                <span class="sm-st-icon st-red"><i class="fa fa-money"></i></span>
                            </p>
                            <div class="sm-st-info centered">
                                <p id="valorDivida">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="description-block">
                        <div class="sm-st tooltipped" data-tooltip="Total a Pagar" >
                            <label class="label label-info">Total</label>
                            <p class="centered">
                                <span class="sm-st-icon st-blue"><i class="fa fa-money"></i></span>
                            </p>
                            <div class="sm-st-info centered">
                                <p id="txtValorTotal">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-122 col-sm-12 col-log-12" style="padding-bottom: 0">
                    <div class="progress progress-striped ">
                        <div id="barWidth" class="progress-bar tooltipped"  role="progressbar"   aria-valuemin="0" aria-valuemax="100" data-tooltip="% de Pagamento Feito">
                            <span class="centered" style="font-size: 13px;"  id="percPago"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-lg-8" id="divTabela2" style="padding-top: 15px;">
    <table id="tabela2" class="table-striped">
        <thead>
        <tr>
            <th>Mês</th>
            <th>Data de Pagamento</th>
            <th>Estado</th>
            <th>Valor Pago</th>
            <th>Dívida</th>
        </tr>
        </thead>
        <tbody id="tabela2Corpo">
        </tbody>
    </table>
</div>

@section('scripts2')
    <script>
        $('.select2').select2();
        /*Buscar Dados de Alunos*/
        $('#inPutAluno').on('change',function () {

            var ano = document.getElementById('selectAno').value;
            var op = $('option[value="'+$(this).val()+'"]');
            var idAluno = op.length ? op.attr('id'):'';
            if(idAluno === '' ||  $('#inPutAluno').val().length=== 0){
                return;
            }
            var intervalo = JSON.parse("{{json_encode($intervalo)}}");
            {{--var valorMensal = JSON.parse("{{json_encode($valorMensal)}}");--}}

            $.ajax({
                url: '/api/listarPorAluno',
                type: 'POST',
                data: {'idAluno':idAluno,'ano':ano},
                success: function (rs) {
                    var curso = rs.curso[0].nome;
                    var valorMensal = rs.curso[0].valormensal;
                    var valorTotal = valorMensal*(intervalo+1);
                    document.getElementById('idFotoAluno').src = '{{asset('img/upload/')}}'.concat('/' + rs.foto);
                    $('.tr').remove();
                    $('.ss').remove();
                    if(rs.mensal.length <=0){
                        $('#divTabela2').append('<h1 class="centered ss">Ainda Sem Registo</h1>');
                    }else {
                        for (var j = 0; j < rs.mensal.length; j++) {
                            $('#tabela2Corpo').append(" <tr class='tr'><td>" + rs.mensal[j].mes + "</td> " +
                                "<td>" + formatarData(new Date(rs.mensal[j].dataP)) + "</td><td>" + rs.mensal[j].mesEstado + "</td>" +
                                "<td>"+rs.mensal[j].valorTotal+"</td><td>"+rs.mensal[j].divida+"</td></tr>");
                        }
                    }
                    var rk = document.getElementById('tabela2Corpo').rows.length;
                    var prc = ((valorMensal*rk) * 100)/valorTotal;
                    document.getElementById('txtValorTotal').innerHTML = valorTotal;
                    document.getElementById('valorPago').innerHTML = valorMensal*rk;
                    document.getElementById('valorDivida').innerHTML = valorTotal-(valorMensal*rk);
                    document.getElementById('percPago').innerHTML = prc.toFixed(2)+'%';
                    document.getElementById('barWidth').style.width = prc+'%';
                }
            });
        });

        function formatarData(date) {
            var meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

            var dia = date.getDate();
            var mesIndex = date.getMonth();
            var ano = date.getFullYear();
            return dia+'-'+meses[mesIndex]+'-'+ano;
        }
    </script>
@endsection