<?php
echo'<html>
<head>
	<meta charset="UTF-8">
	<title>Columba</title>
<style type="text/css">
	@import url("biblioteca.css");
	
</style>
		
<script>
	function ajuda() {
				
		if(document.getElementById("aj").style.display == "none")
			document.getElementById("aj").style.display = "block";
		else
			document.getElementById("aj").style.display = "none";
	}
</script>
		
</head>
	
<body>

	<div class="top">
		<a class="sair" href="logout.php">Sair</a>
		<button class="ajudab" onclick="ajuda()" >Ajuda?</button>
	</div>
	<div class="header">
		<h1 class="page-title">COLUMBA</h1>
		<form>
			<input type="text" name="livro" placeholder="Pesquise o livro" size="50" class="text">
			<input type="submit" value="Enviar" class="botao">
		</form>
		
	</div>
	
	<div class="busca-avancada">
	<form>
		<div class="opcao">
			<label for="autor">Autor:</label>
			<input type="text" id="autor" name="autor" class="text" placeholder="Pesquise por autor">
		</div>
		<div class="opcao">
			<label for="genero">Gênero:</label>
			<input type="text" id="genero" name="genero" class="text" placeholder="Pesquise por gênero">
		</div>
		<div class="opcao">
			<label for="ano">Ano:</label>
			<input type="text" id="ano" name="ano" class="text" placeholder="Pesquise pelo ano de publicação">
		</div>
		<div class="opcao">
			<label for="editora">Editora:</label>
			<input type="text" id="editora" name="editora" class="text" placeholder="Pesquise pela editora">
		</div>
	</form>
	</div>
	
	<div id="aj">
		<h2>Ajuda</h2><button class="out" onclick="ajuda()"><img src="x.png"  width="20" height="20"></button>
		
		<h3>Realização de Pesquisas:</h3>
		
			<p>Pesquise em qualquer um dos campos, em qualquer combinação, quando os cmpos de sua escolha estiverem preenchidos clique no botão enviar e serão mostrados todos os livros com aquelas características.</p><br>
			
		<h3>Ir para Área do Aluno:</h3>
		
			<p>Ao clicar no botão "Ir para a sua página" no campo do Aluno da página inicial, você será redirecionado para a sua página, onde poderá ver seu histórico, dados atuais e realizar renovações de livros em empréstimo.</p><br>
			
		<h3>Sair da sua Conta:</h3><br>
			
			<p>Clique no link sair para fazer o "log out" automático da sua conta.</p><br>
		
		<button class="out2" onclick="ajuda()">Fechar</button>
	</div>
	
	<div class="aluno">
		<h3>Área do aluno</h3>
		<p style="color:blue;">Cheque seu histórico, verifique multas e empréstimos e renove os seus livros.</p>
		<a href="Aluno.php" class="bt">Ir para a sua página</a>
	</div>
	
	<div class="informacoes">
		<center><h3>Informações</h3></center>
		<p>
			Funcionamento: de 8 às 20 hrs<br>
			Telefone de contato: (31) 3024-3567<br>
			Endereço: CEFET MG Campi I e II, Belo Horizonte - Minas Gerais<br>
			Aberta para alunos, professores e demais funcionários, para mais informações contate a biblioteca por telefone ou pessoalmente.
		</p>
	</div>	
	

	
</body>
</html>'
?>