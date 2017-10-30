<?php

$html = "
<table id='tabela' width='90%' border='1'>
	<tr>
		<th>Título </th>
		<th>Título 2</th>
		<th>Título 3</th>
	</tr>
	<tr>
		<td>Dados 1</td>
		<td>Dados 2</td>
		<td>Dados 3</td>
	</tr>
	<tr>
		<td>Dados 4</td>
		<td>Dados 5</td>
		<td>Dados 6</td>
	</tr>
	<tr>
		<td>Dados 7</td>
		<td>Dados 8</td>
		<td>Dados 9</td>
	</tr>
</table>
";


// Determina que o arquivo é uma planilha do Excel
header("Content-type: application/vnd.ms-excel");

// Força o download do arquivo
header("Content-type: application/force-download");

// Seta o nome do arquivo
header("Content-Disposition: attachment; filename=file32.xls");

header("Pragma: no-cache");

// Imprime o conteúdo da nossa tabela no arquivo que será gerado
echo $html;

//echo
?>