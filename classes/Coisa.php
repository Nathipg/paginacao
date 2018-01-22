<?php

class Coisa {

	public function lista( $pagina, $quantidade ) {
		$conectar = new Conectar();
		$conexao = $conectar->connect();

		$inicio = $pagina * $quantidade - $quantidade;

		$coisas = $conexao->query('
			SELECT *
			FROM   coisa
			LIMIT ' . $inicio . ', ' . $quantidade );

		$conexao->close();

		$lista = array();

		foreach( $coisas AS $coisa ) {
			array_push( $lista, $coisa );
		}

		return $lista;
	}

	public function quantidadeTotal() {
		$conectar = new Conectar();
		$conexao = $conectar->connect();

		$coisas = $conexao->query('
			SELECT COUNT(id) AS quantidade
			FROM   coisa');

		$conexao->close();

		$coisa = mysqli_fetch_assoc( $coisas );

		return $coisa['quantidade'];
	}

}

?>