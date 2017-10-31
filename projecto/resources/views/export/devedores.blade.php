<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8"/>
        <link type="text/css" rel="stylesheet" href="css/export.css">
    </head>

    <body>
        <h2>Alunos Devedores</h2>
        <h3>{{$mesAno}}</h3>

        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
            </tr>
            </thead>

            <tbody>
                @foreach($dados as $alu)
                    <tr>
                        <td>{{$alu->nomeAluno.' '.$alu->apelido}}</td>
                        <td>{{$alu->nomeTurma}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>