<?php 

function validaLogin($dados){
    $erros = [];

    if(!isset($dados["email"])){
        $erros[] = "O email deve ser informado";
    }

    if(!isset($dados["senha"])){
        $erros[] = "A senha deve ser informada";
    }

    return $erros;
}





?>