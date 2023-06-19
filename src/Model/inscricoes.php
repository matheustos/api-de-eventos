<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

function inscricao(){

    $connect = connect();

    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $evento = $_POST['evento'];

    $sql_busca = "SELECT * FROM eventos WHERE Nome = '$evento'";
    $resultado = mysqli_query($connect, $sql_busca);

    if ($resultado->num_rows > 0) {
        
        // Inserir os dados na tabela de inscrições
        $sql = "INSERT INTO inscricoes (Nome, Email, Evento) VALUES ('$nome', '$email', '$evento')";
        $resposta = mysqli_query($connect, $sql);

        return $resposta;
    }

}

?>