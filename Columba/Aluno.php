<?php
echo'<html>
	<head>
		<meta charset="UTF-8">
		<title>Área do Aluno</title>
		
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
			<button class="ajudab" onclick="ajuda()">Ajuda?</button>
			<a class="inicio" href="Columba.php"><img src="branca.png"  width="55" height="30"></a>
		</div>
		<div class="header">
			<h1 class="page-title">COLUMBA</h1>

			
		</div>
		
		<div id="aj">
		<h2>Ajuda</h2><button class="out" onclick="ajuda()"><img src="x.png"  width="20" height="20"></button>
			
				
				<h3>Visualização de Dados:</h3>
				
					<p>A tabela desta página contém os seus dados.</p><br>
					
				<h3>Renovar Livro:</h3>
				
					<p>Clique na célula da tabela de renovação do livro de seu interesse e caso esteja dentro do tempo limite o exemplar será renovado.</p><br>
					
				<h3>Checar Histórico:</h3>
				
					<p>Clique na célula de histórico resumida da tabela, para ver a versão completa.</p><br>
						
				<h3>Retornar a Página Inicial da Columba:</h3>
				
					<p>Clique no icone da casa para retornar a página inicial da Columba.</p><br>
					
				<h3>Sair da sua conta:</h3>
			
					<p>Clique no link sair para fazer o "log out" automático da sua conta.</p><br>
			
			<button class="out2" onclick="ajuda()">Fechar</button>
		</div>
		
		<div class="centroaluno">
			<table class="tabelaaluno">
				<tr>
					<td rowspan="4" colspan="2">foto aluno</td>
					<td colspan="5">Nome do aluno</td>
				</tr>
				<tr>
					<td colspan="3">Número de Matricula</td>
					<td colspan="3">Historico</td>
				</tr>
				<tr>
					<td colspan="3">Emprestimo</td>
					<td colspan="3"> Renovação</td>
				</tr>
				<tr>
					<td colspan="3">Emprestimo</td>
					<td colspan="3"> Renovação</td>
				</tr>
				<tr>
					<td colspan="7">Multas, ocorrencias e dados atuais relevantes</td>
				</tr>
				
			</table>
		</div>
		

	
	
	
	
	</body>
	
</html>'
?>
	
		