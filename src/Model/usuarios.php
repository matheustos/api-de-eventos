<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';


function cadastroUsuario($user){
    $connect = connect();

    $nome = $user['nome'];
    $id_user = $user['id_user'];
    $email = $user['email'];
    $senha = $user['senha'];

    $senha_cripto = sha1($senha);

    $sql = "INSERT INTO usuarios (Nome, id_user, Email, Senha) VALUES ('$nome', '$id_user', '$email', '$senha_cripto')";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;

}




?>