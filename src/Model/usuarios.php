<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

function cadastroUsuario($user){
    $connect = connect();

    $nome = $user['nome'];
    $id_user = $user['id_user'];
    $email = $user['email'];
    $senha = $user['senha'];

    $senha_cripto = sha1($senha);

    $sql = "INSERT INTO usuarios (id_user, Nome, Email, Senha) VALUES ('$id_user', '$nome', '$email', '$senha_cripto')";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;

}



?>