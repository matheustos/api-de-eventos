<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

function listarEventos(){
    $connect = connect();

    $query = "SELECT * FROM eventos";
    $resultado = mysqli_query($connect, $query);

    // Verifica se há resultados e formata o retorno de cada evento
    $numEventos = $resultado->num_rows;

    if ($numEventos > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            foreach ($row as $key => $value) {
                echo $key . ": " . $value."<br>";
            }
            echo "<br>"."<hr>";
        }
    } else {
        echo "Nenhum evento encontrado.";
    }
}

function listarPorCategoria($dados){
    $connect = connect();

    $categoria = $dados['categoria'];

    $query = "SELECT * FROM eventos WHERE categoria = '$categoria'";
    $resultado = mysqli_query($connect, $query);

    // Verifica se há resultados e formata o retorno de cada evento
    $numEventos = $resultado->num_rows;

    if ($numEventos > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            foreach ($row as $key => $value) {
                echo $key . ": " . $value."<br>";
            }
            echo "<br>"."<hr>";
        }
    } else {
        echo "Nenhum evento encontrado.";
    }
}

function listarPorData($dados){
    $connect = connect();

    $data = $dados['data_inicio'];

    $query = "SELECT * FROM eventos WHERE Inicio = '$data'";
    $resultado = mysqli_query($connect, $query);

    // Verifica se há resultados e formata o retorno de cada evento
    $numEventos = $resultado->num_rows;

    if ($numEventos > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            foreach ($row as $key => $value) {
                echo $key . ": " . $value."<br>";
            }
            echo "<br>"."<hr>";
        }
    } else {
        echo "Nenhum evento encontrado.";
    }
}






?>