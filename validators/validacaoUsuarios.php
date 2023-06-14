<?php 
function validaUsuario($user){
    $erros = [];

    if(!isset($user['nome'])){
        $erros[] = "O nome deve ser informado";
    }

    if(!isset($user['id_user'])){
        $erros[] = "O id do usuario deve ser informado";
    }

    if(!isset($user['email'])){
        $erros[] = "O email deve ser informado";
    }

    if(!isset($user['senha'])){
        $erros[] = "A senha deve ser informada";
    }

    return $erros;
}



?>