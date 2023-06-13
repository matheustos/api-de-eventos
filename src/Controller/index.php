<?php 
include '../../validators/validacaoAgendamento.php';
include 'C:\wamp64\www\api-de-eventos\src\Model\index.php';

function insertAgendamentoController($agendamento)
{
    $erros = validaAgendamento($agendamento);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(insereAgendamento($agendamento)){
            return formatarRetorno(true, "Produto inserido com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao inserir produto");
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