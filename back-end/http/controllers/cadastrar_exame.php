<?php

include("conexao.php");

$nmPaciente = $_POST['nmPaciente'];
$endereco = $_POST['endereco'];
$dtNascimento = $_POST['dtNascimento'];
$cpf = $_POST['cpf'];
$arqExame = $_POST['arqExame'];


$sql = "INSERT INTO tbexams(nmPaciente, endereco, dtNascimento, cpf, arqExame)
        VALUES('$nmPaciente', '$endereco', '$dtNascimento', '$cpf', '$arqExame')";

$sql1 = "SELECT * FROM tbexams WHERE nmPaciente='$nmPaciente'";

$query = mysqli_query($conexao, $sql1);

if (!$query) {
    echo (mysqli_error($conexao));
    exit;
}

if (mysqli_num_rows($query) == 1) {
    $response = array(
        "success" => false, "message" => "Exame já existe para esse paciente!", "data" => array()
    );
    echo json_encode($response);
} else {
    if (!$query) {
        echo (mysqli_error($conexao));
        exit;
    }

    $query = mysqli_query($conexao, $sql);

    $response = array(
        "success" => true, "message" => "Exame solicitado com sucesso!", "data" => array(
            "nmPaciente" => $nmPaciente
        )
    );
    echo json_encode($response);
}
