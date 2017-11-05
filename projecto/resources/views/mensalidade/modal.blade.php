
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="li_calendar"></i>&nbsp;{{$mes}}</h4>
    <input id="inputMes" type="hidden" value="{{$mes}}">
</div>
<div class="modal-body" >

    <table border="2" style="width: 100%" id="tabelaAll">
        <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Curso-Turma</th>
            <th>Dívida/Valor Pago</th>
            <th>Total</th>
        </tr>
        </thead>

        <tbody id="tabeAllCorpo">
        <?php $totalDivida=0.0; $totalPago=0.0 ?>
        <tr>
            <td style="height: 110px; border: 2px solid #89ccdf; font-size: 25px">Devedores</td>
            <td style="border: 2px solid #89ccdf">
                @foreach($devedores as $dev)
                    <p class="myP">{{$dev->nomeAluno.' '.$dev->apelido}}</p>
                @endforeach
            </td>
            <td style="border: 2px solid #89ccdf">
                @foreach($devedores as $dev)
                    <p class="myP">{{$dev->curso.' - '.$dev->turma}} </p>
                @endforeach
            </td>

            <td style="border: 2px solid #89ccdf">
                @foreach($devedores as $dev)
                    <?php $totalDivida+=$dev->divida?>
                    <p class="myP">{{$dev->divida.' Mt'}} </p>
                @endforeach
            </td>
            <td style="height: 110px; border: 2px solid #89ccdf; font-size: 25px"><?php echo $totalDivida.' Mt'?></td>
        </tr>

        <tr>
            <td style="height: 110px; border: 2px solid #89ccdf; font-size: 25px">Não Devedores</td>
            <td style="border: 2px solid #89ccdf">
                @foreach($honestos as $dev)
                    <p class="myP">{{$dev->nomeAluno.' '.$dev->apelido}}</p>
                @endforeach
            </td>
            <td class="myPDady" style="border: 2px solid #89ccdf">
                @foreach($honestos as $dev)
                    <p class="myP">{{$dev->curso.' - '.$dev->turma}} </p>
                @endforeach
            </td>
            <td style="border: 2px solid #89ccdf">
                @foreach($honestos as $dev)
                    <?php $totalPago += $dev->divida?>
                    <p class="myP">{{$dev->divida.' Mt'}} </p>
                @endforeach
            </td>
            <td style="height: 110px; border: 2px solid #89ccdf; font-size: 25px"><?php echo $totalPago.' Mt'?></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-outline" id="imprimir">Impimir</button>
</div>
<script>
    $('#imprimir').click(function () {
//        $('#tabelaAll').tableExport({type:'excel',escape:'false'});
        var mes = document.getElementById('inputMes').value;
        window.location ='/exportDevedoresPDF?mes='+mes+'&ano='+2017+'&tabela=todos';

    });
</script>