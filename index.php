<?php
	require 'config.php';

	$coisa = new Coisa();

	$pagina = isset( $_GET['pagina'] ) ? $_GET['pagina'] : 1;
	$quantidade = isset( $_GET['quantidade'] ) ? $_GET['quantidade'] : 2;
	$quantidadeTotal = $coisa->quantidadeTotal();
	$quantidadePaginas = (int) ( $quantidadeTotal / $quantidade );
	$quantidadePaginas = $quantidadeTotal % $quantidade != 0 ? $quantidadePaginas + 1 : $quantidadePaginas;

	$lista = $coisa->lista( $pagina, $quantidade );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Paginação de Coisas</title>

	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<h1>Coisas</h1>

	<form>
		<label for="quantidade">Quantidade:</label>
		<select name="quantidade" id="quantidade">
			<option value="1" <?= ( $quantidade == 1 ? 'selected' : '' ) ?> >1</option>
			<option value="2" <?= ( $quantidade == 2 ? 'selected' : '' ) ?> >2</option>
			<option value="3" <?= ( $quantidade == 3 ? 'selected' : '' ) ?> >3</option>
		</select>

		<label for="pagina">Página:</label>
		<select name="pagina" id="pagina">
			<?php
				for( $i = 1; $i <= $quantidadePaginas; $i++) {
					echo '<option value="' . $i . '" ' . ( $pagina == $i ? 'selected' : '' ) . '>' . $i . '</option>';
				}
			?>
		</select>

		<input type="submit" value="Filtrar">
	</form>

	<table id="tabelaCoisas">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach( $lista AS $coisa ) {
					echo '<tr>';
					echo '	<td>' . $coisa['id'] . '</td>';
					echo '	<td>' . $coisa['nome'] . '</td>';
					echo '</tr>';
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Nome</th>
			</tr>
		</tfoot>
	</table>
</body>
</html>