<?php 
include_once 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

session_start();

function login(){

    if (session_status() == PHP_SESSION_NONE) {
        // Nenhuma sessão ativa, iniciar uma nova sessão
        session_start();
    }

    // Verificar se o formulário de login foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connect = connect();

        // Obter os valores do formulário de login
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha_cripto = sha1($senha);

        // Verificar se o usuário e a senha são válidos 
        $sql = "SELECT * FROM usuarios WHERE Email = '$email' AND Senha = '$senha_cripto'";
        $resultado = mysqli_query($connect, $sql);

        // Verifica se a consulta retornou resultados
        if ($resultado->num_rows > 0) {
            // Consultar o tipo de usuário no banco de dados
            $query = "SELECT id_user FROM usuarios WHERE email = '$email'";
            $result = mysqli_query($connect, $query);

            // Verificar se a consulta retornou algum resultado
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id_user = $row['id_user'];

                if ($id_user == 1) {
                    $_SESSION['id_admin'] = $id_user;
                    return $result;
                }else{
                    $_SESSION['id_user'] = $id_user;
                    return $result;
                }
            }
            }
        }
}







?>