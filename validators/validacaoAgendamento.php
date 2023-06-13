<?php 
function validaAgendamento($agendamento) {
    $erros = [];

    if(!isset($agendamento["nome"])) {
        $erros[] = "O nome do produto é obrigatório";
    }

    if(!isset($agendamento["data_hora_inicio"])) {
        $erros[] = "O Data/Hora de inicio são obrigatórios";
    } 

    if(!isset($agendamento["data_hora_inicio"])) {
        $erros[] = "O Data/Hora de inicio são obrigatórios";
    } 

    if(!isset($agendamento["local"])) {
        $erros[] = "O local é obrigatório";
    }

    if(!isset($agendamento["descricao"])){
        $erros[] = "É obrigatório adicionar uma descrição.";
    }

    if(!isset($agendamento["vagas"])){
        $erros[] = "É necessário adicionar a quantidade de vagas.";
    }elseif(!is_numeric($agendamento["vagas"])){
        $erros[] = "A quantidade de vagas deve ser um número";
    }

    if(!isset($agendamento["categoria"])){
        $erros[] = "É obrigatório adicionar a categoria do evento.";
    }

    if(count($erros) > 0) {
        $_SESSION["erros"] = $erros;
    }

    return $erros;
}







?>