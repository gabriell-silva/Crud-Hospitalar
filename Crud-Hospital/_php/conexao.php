<?php 

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "cadastro";

    $conexao = mysqli_connect($servidor,$usuario,$senha)
    or die ("Sem conexão ao servidor");

    $db = mysqli_select_db($conexao,$bd);

?>