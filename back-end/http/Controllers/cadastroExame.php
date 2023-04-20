<?php

    include("conexao.php");

    $nmPaciente = $_POST["nmPaciente"];
    $endereco = $_POST["endereco"];
    $dtNascimento = $_POST["dtNascimento"];
    $cpf = $_POST["cpf"];
    $arqExame = $_POST["arqExame"];

    $sql = "INSERT INTO tbexams(nmPaciente, endereco, dtNascimento, cpf, arqExame)
            VALUES('$nmPaciente','$endereco','$dtNascimento','$cpf','$arqExame')";

    $query = mysqli_query($conexao,$sql);

    if(!$query) {
        echo(mysqli_error($conexao));
        exit;
    }

    if (mysqli_affected_rows($conexao) == 1) {
        $response = array(
            "success" => true
            ,"message" => "Exame solicitado com sucesso!"
            ,"data" => array()
        );
        echo json_encode($response);
    } else {
        $response = array(
            "success" => false
            ,"message" => "Erro ao cadastrar exame!"
            ,"data" => array()
        );
        echo json_encode($response);
    }

?>