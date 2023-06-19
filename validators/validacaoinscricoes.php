<?php 
function validaInscricoes($inscricao){
    $erros = [];

    if(!isset($inscricao["nome"])){
        $erros[] = "O nome deve ser informado";
    }

    if(!isset($inscricao["email"])){
        $erros[] = "O email deve ser informada";
    }

    if(!isset($inscricao["evento"])){
        $erros[] = "O nome do evento deve ser informada";
    }

    return $erros;
}



?>