<?php 
function validaInscricao($dados){
    $erros = [];

    if(!isset($dados['evento'])){

        $erros[] = "Necessário informar nome do evento.";
    }

    if(empty($dados['nome'])){
        $erros[] = "Necessario informar o nome.";
    }

    if(empty($dados['email'])){
        $erros[] = "Necessario informar o email";
    }

    return $erros;
}

function validaAvaliacao($dados){
    $erros = [];

    if(!isset($dados['evento'])){

        $erros[] = "Necessário informar nome do evento.";
    }

    if(empty($dados['nome'])){
        $erros[] = "Necessario informar o nome.";
    }

    if(empty($dados['email'])){
        $erros[] = "Necessario informar o email";
    }

    if(empty($dados['estrelas'])){
        $erros[] = "Necessario informar a quantidade de estrelas.";
    }

    if(empty($dados['comentario'])){
        $erros[] = "Necessario digitar o comentário.";
    }

    return $erros;
}

?>