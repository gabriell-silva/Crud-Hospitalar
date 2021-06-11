<?php

    include("conexao.php");

    if (isset($_POST['botao'])) {
        $arqExame = $_FILES['arquivo']['name'];

        $arqExame = str_replace("","_",$arqExame);
        $arqExame = str_replace("ç","c",$arqExame);

        if (file_exists("arquivos/$arqExame")) {
            $a++;
        }

        $arqExame = "[".$a."]".$arqExame;
    }

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'],"arquivos/".$arqExame)){
        echo 'upload ok'
    } else {
        echo 'realizado'
    }


?>
