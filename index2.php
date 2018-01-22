<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Paginação de Coisas</title>

	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<h1>Coisas</h1>

	<form id="filtrarCoisas" action="" method="POST">
		<label for="quantidade">Quantidade:</label>
		<select name="quantidade" id="quantidade" onchange="carregarPaginas( document.querySelector('#pagina').value )">
			<option value="1">1</option>
			<option value="2" selected>2</option>
			<option value="3">3</option>
		</select>

		<label for="pagina">Página:</label>
		<select name="pagina" id="pagina" onchange="carregarListagem()"></select>
	</form>

	<table id="tabelaCoisas">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody></tbody>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Nome</th>
			</tr>
		</tfoot>
	</table>
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>