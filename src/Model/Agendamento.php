<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';



function insereAgendamento($dados){
    $erros = [];

    $connect = connect();

    $nome = $dados["nome"];
    $data_inicio = $dados["data_inicio"];
    $data_termino = $dados["data_termino"];
    $hora_inicio = $dados["hora_inicio"];
    $hora_termino = $dados["hora_termino"];
    $local = $dados["local"];
    $descricao = $dados["descricao"];
    $vagas = $dados["vagas"];
    $categoria = $dados["categoria"];
    $status = "Aberto para inscricoes";


    $sql = "INSERT INTO eventos (Nome, Inicio, Termino, Hora_inicio, Hora_termino, Local, Descricao, vagas, Categoria, status) VALUES ('$nome', '$data_inicio', '$data_termino', '$hora_inicio', '$hora_termino', '$local', '$descricao', '$vagas', '$categoria', '$status')";
    $resultado = mysqli_query($connect, $sql);
    
    return $resultado;
 
} 

function cancelaAgendamento($dados){
    $connect = connect();

    $data_atual = date('Y-m-d');

    $id = $dados['id'];

    $id_user = $dados['id_user'];

    $query = "SELECT Inicio FROM eventos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $query);

    // Verificar se a consulta foi executada com sucesso
    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $inicio = $row['Inicio'];
    }

    if($inicio != $data_atual){

        $sql = "UPDATE eventos SET status = 'Cancelado' WHERE id = $id";
        $resultado = mysqli_query($connect, $sql);

        return $resultado;
    }

}

function iniciaEvento($dados){
    $connect = connect();

    $id = $dados['id'];

    $id_user = $dados['id_user'];

    $data_atual = date('Y-m-d');

    $connect = connect();
    
    $query = "SELECT status FROM eventos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $query);

    // Verificar se a consulta foi executada com sucesso
    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $inicio = $row['Inicio'];
    }

    if($inicio == $data_atual){
        $sql = "UPDATE eventos SET status = 'Em andamento' WHERE id = $id";
        $resultado = mysqli_query($connect, $sql);

        return $resultado;
    }  

}

function concluirEvento($dados){
    $connect = connect();

    $id = $dados['id'];

    $id_user = $dados['id_user'];

    $query = "SELECT status FROM eventos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $query);

    // Verificar se a consulta foi executada com sucesso
    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $status = $row['status'];

    if($status == "Em andamento"){
        $sql = "UPDATE eventos SET status = 'Concluido' WHERE id = $id";
        $result = mysqli_query($connect, $sql);
        return $result;
    }

    }
}




?>