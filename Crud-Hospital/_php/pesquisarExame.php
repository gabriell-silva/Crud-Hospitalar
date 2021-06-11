<?php

include("conexao.php");

$nmPaciente = $_POST["paciente"];

if ($nmPaciente) {
	$sql = "SELECT * FROM tbexams WHERE nmPaciente LIKE '%$nmPaciente%'";
} else {
	$sql = "SELECT * FROM tbexams";
} 

$resultado = mysqli_query($conexao, $sql); 
$array = array();

while ($linha = mysqli_fetch_assoc($resultado)) {
	array_push($array, $linha);	
}

echo json_encode($array);

?>
