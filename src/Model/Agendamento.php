<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

function insereAgendamento($agendamento)
{
    $connect = connect();

    $nome = $agendamento["nome"];
    $data_inicio = $agendamento["data_inicio"];
    $data_termino = $agendamento["data_termino"];
    $hora_inicio = $agendamento["hora_inicio"];
    $hora_termino = $agendamento["hora_termino"];
    $local = $agendamento["local"];
    $descricao = $agendamento["descricao"];
    $vagas = $agendamento["vagas"];
    $categoria = $agendamento["categoria"];


    $sql = "INSERT INTO eventos (Nome, Inicio, Termino, Hora_inicio, Hora_termino, Local, Descricao, vagas, Categoria) VALUES ('$nome', '$data_inicio', '$data_termino', '$hora_inicio', '$hora_termino', '$local', '$descricao', '$vagas', '$categoria')";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;
} 

function cancelaAgendamento($agendamento){
    $connect = connect();

    $id = $agendamento['id'];

    $sql = "UPDATE eventos SET status = 'Cancelado' WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;

}




?>