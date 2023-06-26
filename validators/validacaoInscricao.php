<?php 
// VALIDAÇÕES IMPORTANTES

// valida se os dados necessários para inscrição foram passados
function validaInscricao($dados){
    $erros = [];

    if(!isset($dados['evento'])){

        $erros[] = "Necessário informar nome do evento.";
    }

    if(empty($dados['nome'])){
        $erros[] = "Necessario informar o nome.";
    }

    return $erros;
}

// valida se os dados necessários para avaliação foram passados
function validaAvaliacao($dados){
    $erros = [];

    if(!isset($dados['evento'])){

        $erros[] = "Necessário informar nome do evento.";
    }

    if(empty($dados['nome'])){
        $erros[] = "Necessario informar o nome.";
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