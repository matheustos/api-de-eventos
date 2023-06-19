<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\inscricoes.php';
include 'C:\wamp64\www\api-de-eventos\validators\validacaoinscricoes.php';

function InscricaoController($inscricao){
    $erros = validaInscricoes($inscricao);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(inscricao($inscricao)){
            return formatarRetorno(true, "Usuario inscrito com sucesso.");
        } else {
            return formatarRetorno(false, [], "Erro ao inscrever usuario.");
        }
        };
}

function formatarRetorno($success, $content, $errors = [])
{
    return [
        "success" => $success,
        "content" => $content,
        "errors" => $errors
    ];
}




?>