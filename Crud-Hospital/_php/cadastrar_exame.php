<?php

    include("conexao.php");

    $nmPaciente $_POST['nmPaciente'];
    $exame $_POST['exame'];
    $dtSolicitacao $_POST['dtsolicitacao'];
    $medSolicitacao $_POST['medSolicita'];
    $motivoSolicita $_POST['motivoSolicita'];


    $sql = "INSERT INTO tbexams(nmPaciente, exame, dtSolicitacao, medSolicita, motivoSolicita)
        VALUES('$nmPaciente', '$exame', '$dtSolicitacao', '$medSolicita', '$motivoSolicita')";

    $sql1 = "SELECT * FROM tbexams WHERE nmPaciente='$nmPaciente' AND exame='$exame'";

    $query = mysqli_query($conexao,$sql1);

    if(!$query) {
        echo(mysqli_error($conexao));
        exit;
    }

    if (mysqli_num_rows($query) == 1) {
        $response = array(
            "success" => false
            ,"message" => "Exame já existe para esse paciente!"
            ,"data" => array()
        );
        echo json_encode($response);
    } else {
        if(!$query) {
            echo(mysqli_error($conexao));
            exit;
        }

        $query = mysqli_query($conexao,$sql);
    
        $response = array(
            "success" => true
            ,"message" => "Exame solicitado com sucesso!"
            ,"data" => array(
                "nmPaciente" => $nmPaciente
                ,"exame" => $exame
            )
        );
        echo json_encode($response);
    }

?>