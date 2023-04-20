<?php
	include("conexao.php");

	$id = $_POST["id"];

	$sql = "DELETE FROM tbexams WHERE id = '$id' ";
	$query = mysqli_query($conexao,$sql);

	if (mysqli_affected_rows($conexao) == 1) {
        $response = array(
            "success" => true
            ,"message" => "Exame Excluido com sucesso!"
            ,"data" => array()
        );
        echo json_encode($response);
    } else {
        $response = array(
            "success" => false
            ,"message" => "Erro ao excluir exame!"
            ,"data" => array()
        );
        echo json_encode($response);
    }
?>