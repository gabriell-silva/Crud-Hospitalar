<?php

    include("conexao.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO users(email,senha)
        VALUES('$email','$senha')";

    $sql1 = "SELECT * FROM users WHERE email='$email'";

    $query = mysqli_query($conexao,$sql1);

    if(!$query) {
        echo(mysqli_error($conexao));
        exit;
    }

    if (mysqli_num_rows($query) == 1) {
        $response = array(
            "success" => false
            ,"message" => "Já existe cadastro com esse email!"
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
            ,"message" => "Cadastro realizado com sucesso!"
            ,"data" => array(
                "email" => $email
            )
        );
        echo json_encode($response);
    }

?>