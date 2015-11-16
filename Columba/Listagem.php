<?php
echo'<html>
	<head>
		<meta charset="UTF-8">
		<title>Listagem</title>
		
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
			<a class="sair" href="login.php">Sair</a>
			<button class="ajudab" onclick="ajuda()" href="" >Ajuda?</button>
			<a class="inicio" href="Columba.php"><img src="branca.png"  width="55" height="30"></a>
			<a class="al" href="Aluno.php"><img src="p.png"  width="30" height="20"></a>
		</div>
		<div class="header">
			<h1 class="page-title">COLUMBA</h1>

		</div>
		
		<div id="aj">
			<h2>Ajuda</h2><button class="out" onclick="ajuda()"><img src="x.png"  width="20" height="20"></button>
		
		
					<h3>Selecionar livro:</h3>
					
						<p>Clique na imagem ou nome do livro de sua escolha para ser redirecionado para a página deste.</p><br>
						
					<h3>Retornar a Página inicial da Columba:</h3>
					
						<p>Clique no icone da casa para retornar a página inicial da Columba.</p><br>
						
					<h3>Ir para a Página do Aluno:</h3>
						
						<p>Clique no ícone do personagem para ser redirecionado para a sua página pessoal, onde poderá ver seu histórico, dados atuais e realizar renovações de livros em empréstimo.</p><br>
						
					<h3>Sair da sua Conta:</h3>
						
						<p>Clique no link sair para fazer o "log out" automático da sua conta.</p><br>
			
			<button class="out2" onclick="ajuda()">Fechar</button>
		</div>
		
		
	</body>
</html>'
?>