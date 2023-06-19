<?php 
function validaAgendamento($agendamento) {
    $erros = [];

    $dataAtual =  date('Y-m-d'); // Obtém a data atual


    if(!isset($agendamento['data_inicio'])) {
        $erros[] = "É necessário adiconar data e hora do agendamento.";
    }

    if(!isset($agendamento['data_termino'])) {
        $erros[] = "É necessário adiconar data e hora de termino do agendamento.";
    }
    
    if ($agendamento['data_inicio'] != $agendamento["data_termino"]) {
        $erros[] = "A data de termino do evento deve ser a mesma que a data de inicio.";
    }

    if(!isset($agendamento['nome'])) {
        $erros[] = "O nome do evento e obrigatorio";
    }

    if(!isset($agendamento['data_inicio'])) {
        $erros[] = "O Data de inicio e obrigatorio";
    } 

    if(!isset($agendamento['data_termino'])) {
        $erros[] = "A Data de termino e obrigatorio";
    } 

    if(!isset($agendamento['hora_inicio'])) {
        $erros[] = "A Hora de inicio e obrigatorio";
    } 

    if(!isset($agendamento['hora_termino'])) {
        $erros[] = "A Hora de termino e obrigatorio";
    } 


    if(!isset($agendamento['local'])) {
        $erros[] = "O local e obrigatório";
    }

    if(!isset($agendamento['descricao'])){
        $erros[] = "É obrigatório adicionar uma descrição.";
    }

    if(!isset($agendamento['vagas'])){
        $erros[] = "É necessário adicionar a quantidade de vagas.";
    }elseif(!is_numeric($agendamento['vagas'])){
        $erros[] = "A quantidade de vagas deve ser um número";
    }

    if(!isset($agendamento['categoria'])){
        $erros[] = "É obrigatório adicionar a categoria do evento.";
    }

    if(count($erros) > 0) {
        $_SESSION["erros"] = $erros;
    }
    return $erros;
}

function validaCancelamento($agendamento){
    $erros = [];

    if(!isset($agendamento['id'])){

        $erros[] = "Não existe evento com esse id.";
    }
    return $erros;
}







?>