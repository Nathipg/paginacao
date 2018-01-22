<?php

require 'config.php';

$funcao = isset( $_POST['funcao'] ) ? $_POST['funcao'] : null;

switch ( $funcao ) {
	case 'numeroPaginas':
		$coisa = new Coisa();
		$quantidade = $_POST['quantidade'];
		$quantidadeTotal = $coisa->quantidadeTotal();
		$quantidadePaginas = (int) ( $quantidadeTotal / $quantidade );
		$quantidadePaginas = $quantidadeTotal % $quantidade != 0 ? $quantidadePaginas + 1 : $quantidadePaginas;
		die(json_encode( array('numeroPaginas' => $quantidadePaginas) ));
		break;
	case 'listagem':
		$coisa = new Coisa();
		$pagina = $_POST['pagina'];
		$quantidade = $_POST['quantidade'];
		$lista = $coisa->lista( $pagina, $quantidade );
		die(json_encode( array('lista' => $lista) ));
		break;
	default:
		die(json_encode( array('mensagem' => 'Função não existe') ));
		break;
}

?>