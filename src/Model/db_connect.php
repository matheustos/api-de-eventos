<?php 

// conexão com banco de dados
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "sistema-de-eventos";

    $connect = mysqli_connect($servername, $username, $password, $db_name);
    mysqli_set_charset($connect, "utf8");

    return $connect;
}

?>