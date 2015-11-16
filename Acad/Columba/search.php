<?php 

$text = $_POST['livro'];

if(isset($_POST['submitSimple']))
{
   $con = createCon();
   simpleSearch($con, $text);
}

function createCon() {
	$conn = new mysqli("localhost", "root", "", "acad");
	if ($conn->connect_errno) {echo "Erro";}
	return $conn;
} 

function simpleSearch ($con, $text) {
	$table = $con->query("SELECT titulo, autor, editora FROM acervo WHERE titulo='$text' OR autor='$text' ORDER BY titulo");
	$row = $table->fetch_array(MYSQLI_NUM);
	for ($i = 0 ; $i < sizeof($row) ; $i++) {
		echo $row[$i]." ";
	}
	echo sizeof($row);
}

 ?>