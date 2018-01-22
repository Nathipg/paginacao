<?php

class Conectar {

	private $host = '127.0.0.1';
	private $usuario = 'root';
	private $senha = ' ';
	private $banco = 'gerenciarCoisa';

	public function connect() {
		$conexao = mysqli_connect( $this->host, $this->usuario, $this->senha, $this->banco );
		return $conexao;
	}

}

?>