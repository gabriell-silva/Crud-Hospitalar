<?php

    include("conexao.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM users WHERE email='$email' AND senha = '$senha'";

    $query = mysqli_query($conexao,$sql);

    if(mysqli_num_rows($query) == 0) {
        $response = array(
            "success" => false
            ,"message" => "Email ou senha invalidos!"
            ,"data" => array()
        );
        echo json_encode($response);
    }
    else {
        $response = array(
            "success" => true
            ,"message" => "Login efetuado com sucesso!"
            ,"data" => array(
                "email" => $email
            )
        );
        echo json_encode($response);
    }
?>