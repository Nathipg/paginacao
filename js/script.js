function carregarPaginas() {

	let selecionado = arguments.length > 0 ? arguments[0] : null;
	let quantidadeItens = document.querySelector('#quantidade').value;

	$.ajax({
		type: 'POST',
		url: 'gerenciarAjax.php',
		data: {funcao: 'numeroPaginas', quantidade: quantidadeItens},
		success: function ( retorno ) {
			try {
				retorno = JSON.parse( retorno );

				selectPaginas = document.querySelector('#pagina');
				selectPaginas.innerHTML = '';
				for( i = 1; i <= retorno.numeroPaginas; i++) {
					selectPaginas.innerHTML = `
					${selectPaginas.innerHTML}
					<option value="${i}" ${ (i == selecionado ? 'selected' : '') }>${i}</option>`;
				}
				carregarListagem();

			} catch (e) {
				alert('Erro na requisição');
			}
		}
	});
}

function carregarListagem() {
	let quantidadeAtual = document.querySelector('#quantidade').value;
	let paginaAtual = document.querySelector('#pagina').value;

	$.ajax({
		type: 'POST',
		url: 'gerenciarAjax.php',
		data: {funcao: 'listagem', pagina: paginaAtual, quantidade: quantidadeAtual},
		success: function( retorno ) {
			try {
				retorno = JSON.parse( retorno );

				tabela = document.querySelector('#tabelaCoisas tbody');
				tabela.innerHTML = '';
				retorno.lista.forEach(function( elemento ) {
					tabela.innerHTML = `
					${tabela.innerHTML}
					<tr>
						<td>${elemento.id}</td>
						<td>${elemento.nome}</td>
					</tr>`;
				});
			} catch(e) {
				alert('Erro na requisição');
			}
		}
	});
}

carregarPaginas();