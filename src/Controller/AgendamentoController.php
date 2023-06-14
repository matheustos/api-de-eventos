<?php 
include '../../validators/validacaoAgendamento.php';
include 'C:\wamp64\www\api-de-eventos\src\Model\Agendamento.php';

function insertAgendamentoController($agendamento)
{
    $erros = validaAgendamento($agendamento);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(insereAgendamento($agendamento)){
            return formatarRetorno(true, "Evento cadastrado com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao realizar cadastrar evento");
        };
    }

}

function cancelaAgendamentoController($agendamento)
{
    $erros = validaCancelamento($agendamento);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(cancelaAgendamento($agendamento)){
            return formatarRetorno(true, "Evento cancelado com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao realizar cancelamento do evento");
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