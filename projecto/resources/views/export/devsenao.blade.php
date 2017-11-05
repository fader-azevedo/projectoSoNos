<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8"/>
        <link type="text/css" rel="stylesheet" href="css/export.css">
    </head>

    <body>
        <h2>Alunos Devedores & Não Devedores</h2>
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
    </body>
</html>