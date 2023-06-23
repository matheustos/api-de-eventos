<?php 
function validaAgendamento($dados) {
    $erros = [];

    $dataAtual = date('Y-m-d');

    if(!isset($dados['data_inicio'])) {
        $erros[] = "É necessário adiconar data e hora do agendamento.";
    }

    if($dados['data_inicio'] <= $dataAtual){
        $erros[] = "A data de agendamento deve ser superior a data de hoje.";
    }

    if(!isset($dados['data_termino'])) {
        $erros[] = "É necessário adiconar data e hora de termino do agendamento.";
    }
    
    if ($dados['data_inicio'] != $dados["data_termino"]) {
        $erros[] = "A data de termino do evento deve ser a mesma que a data de inicio.";
    }

    if(!isset($dados['nome'])) {
        $erros[] = "O nome do evento e obrigatorio";
    }


    if(!isset($dados['hora_inicio'])) {
        $erros[] = "A Hora de inicio e obrigatorio";
    } 

    if(!isset($dados['hora_termino'])) {
        $erros[] = "A Hora de termino e obrigatorio";
    } 


    if(!isset($dados['local'])) {
        $erros[] = "O local e obrigatório";
    }

    if(!isset($dados['descricao'])){
        $erros[] = "É obrigatório adicionar uma descrição.";
    }

    if(!isset($dados['vagas'])){
        $erros[] = "É necessário adicionar a quantidade de vagas.";
    }elseif(!is_numeric($dados['vagas'])){
        $erros[] = "A quantidade de vagas deve ser um número";
    }

    if(!isset($dados['categoria'])){
        $erros[] = "É obrigatório adicionar a categoria do evento.";
    }

    if(count($erros) > 0) {
        $_SESSION["erros"] = $erros;
    }

    return $erros;
}


function validaCancelamento($dados){
    $erros = [];

    if(!isset($dados['id'])){

        $erros[] = "Não existe evento com esse id.";
    }

    if($dados['id_user'] != 1){
        $erros[] = "Sem permissao.";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do evento";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do usuario";
    }

    return $erros;
}


function validaEvento($dados){
    $erros = [];

    if(!isset($dados['id'])){

        $erros[] = "Não existe evento com esse id.";
    }

    if($dados['id_user'] != 1){
        $erros[] = "Sem permissao.";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do evento";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do usuario";
    }

    return $erros;
}

function validaConclusao($dados){
    $erros = [];

    if(!isset($dados['id'])){

        $erros[] = "Não existe evento com esse id.";
    }

    if($dados['id_user'] != 1){
        $erros[] = "Sem permissao.";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do evento";
    }

    if(!isset($dados['id'])){
        $erros[] = "Necessario informar id do usuario";
    }

    return $erros;
}







?>