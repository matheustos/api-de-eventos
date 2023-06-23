<?php 
include '../../validators/validacaoAgendamento.php';
include 'C:\wamp64\www\api-de-eventos\src\Model\Agendamento.php';


function insertAgendamentoController($dados)
{
    $erros = validaAgendamento($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
            if(insereAgendamento($dados)){
                return formatarRetorno(true, "Evento cadastrado com sucesso");
            } else {
                return formatarRetorno(false, [], "Erro ao realizar cadastrar evento");
            };
    }

}

function cancelaAgendamentoController($dados)
{
    $erros = validaCancelamento($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(cancelaAgendamento($dados)){
            return formatarRetorno(true, "Evento cancelado com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao realizar cancelamento do evento");
        };
    }

}

function iniciaEventoController($dados)
{
    $erros = validaEvento($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(iniciaEvento($dados)){
            return formatarRetorno(true, "Evento iniciado com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao iniciar o evento");
        };
    }

}

function concluirEventoController($dados)
{
    $erros = validaConclusao($dados);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(concluirEvento($dados)){
            return formatarRetorno(true, "Evento concluido com sucesso");
        } else {
            return formatarRetorno(false, [], "Erro ao concluir o evento");
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