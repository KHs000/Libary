<?php

$h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
include_once( $h_dir."database.biblioteca.inc.php" );

session_start();

$liv_id = isset($_SESSION["liv_id"]) ? $_SESSION["liv_id"] : "";
$livro = new TDatabase_Acervo();

$sql  = "SELECT * FROM acervo";
$sql .= " WHERE liv_id = '".$liv_id."'";


$result = $livro->query($sql);
if ($result) {
	$info = $livro->fetch($result);
}
$sql  = "SELECT * FROM local_acervo";
$sql .= " WHERE liv_id = '".$liv_id."'";


$result = $livro->query($sql);
if ($result) {
	$info2 = $livro->fetch($result);
}

echo'<html>
	<head>
		<meta charset="UTF-8">
		<title>Dados do Livro</title>
		
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
			<button class="ajudab" onclick="ajuda()" href="" >Ajuda?</button>
			<a class="inicio" href="Columba.php"><img src="branca.png"  width="55" height="30"></a>
			<a class="al" href="Aluno.php"><img src="p.png"  width="30" height="20"></a>
		</div>
		<div class="header">
			<h1 class="page-title">COLUMBA</h1>

		</div>
		
		<div id="aj">
			<h2>Ajuda</h2><button class="out" onclick="ajuda()"><img src="x.png"  width="20" height="20"></button>
		
					
		
					<h3>Consulta de Dados do Livro:</h3>
					
						<p>A tabela desta página contém os dados referentes ao livro selecionado.</p><br>
						
					<h3>Realizar Reserva do Exemplar:</h3>
					
						<p>Selrecione o campo reservar livro, caso este esteja marcado como disponível. </p><br>
						
					<h3>Retornar a Página inicial da Columba:</h3>
					
						<p>Clique no icone da casa para retornar a página inicial da Columba.</p><br>
						
					<h3>Ir para a Página do Aluno:</h3>
						
						<p>Clique no ícone do personagem para ser redirecionado para a sua página pessoal, onde poderá ver seu histórico, dados atuais e realizar renovações de livros em empréstimo.</p><br>
						
					<h3>Sair da sua Conta:</h3>
						
						<p>Clique no link sair para fazer o "log out" automático da sua conta.</p><br>
			
			<button class="out2" onclick="ajuda()">Fechar</button>
		</div>
		
		<div class="centrolivro">
			<table class="tabelalivro">
				<tr>
					<td rowspan="2">imagem</td>
					<td colspan="2">'.$info['titulo'].'</td>
				</tr>
				<tr>
					<td >'.$info['ano_publicacao'].'</td>
					<td>'.$info['editora'].'</td>
				</tr>
				<tr>
					<td colspan="2">'.$info['autor'].'</td>
					<td >'.$info['assunto'].'</td>
				</tr>

				<tr>
					<td colspan="3">'.$info2['campus'].'</td>
				</tr>
				<tr>
					<td colspan="3">'.$info['status'].'</td>
				</tr>
				
			</table>
		</div>
		

		
	</body>
</html>'
?>