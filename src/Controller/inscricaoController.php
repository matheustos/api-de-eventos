<?php 
include '../../validators/validacaoInscricao.php';
include 'C:\wamp64\www\api-de-eventos\src\Model\inscricao.php';

function inscricaoController($dados)
{
    $erros = validaInscricao($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(inscricao($dados)){
            return formatarRetorno(true, "Inscricao efetuada com sucesso.");
        } else {
            return formatarRetorno(false, [], "Erro ao realizar inscricao.");
        };
    }

}

function presencaController($dados){
    $erros = validaInscricao($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(presenca($dados)){
            return formatarRetorno(true, "Presenca confirmada com sucesso.");
        } else {
            return formatarRetorno(false, [], "Erro ao confirmar presenca.");
        };
    }

}

function avaliacaoController($dados){
    $erros = validaAvaliacao($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(avaliacao($dados)){
            return formatarRetorno(true, "Avaliacao publicada com sucesso.");
        } else {
            return formatarRetorno(false, [], "Erro ao publicar avaliacao.");
        };
    }

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