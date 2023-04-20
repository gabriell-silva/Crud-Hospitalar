<?php
if (isset($_FILES["arqExame"])) {

	$id = $_GET["id"];
	$nmPaciente = $_POST["nmPaciente"];
	$endereco = $_POST["endereco"];
	$dtNascimento = $_POST["dtNascimento"];
	$cpf = $_POST["cpf"];
	$arqExame = $_FILES["arqExame"];
	
	//codigo do upload do arqExame pra pastas
	
	include("conexao.php");
	$sql = "UPDATE exams SET 
	nmPaciente = '$nmPaciente', endereco = '$endereco', dtNascimento = '$dtNascimento', cpf = '$cpf', 
	arqExame = '$arqExame' WHERE id = '$id'";

	$query = mysqli_query($conexao,$sql);

	if ($query) {
		echo "Dados alterados com sucesso!";
	}
	else {
		echo "mysqli_error($conexao)";
	}

}
