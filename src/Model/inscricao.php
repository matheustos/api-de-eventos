<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

// realizar inscrição em um evento
function inscricao($dados){

    $connect = connect();


    $evento = $dados['evento'];
    $nome = $dados['nome'];
    $presenca = "false";

    $sql = "SELECT * FROM eventos WHERE Nome = '$evento'";
    $resultado = mysqli_query($connect, $sql);

// Verifica se há resultados e exibe o dado desejado
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $vagas = $row["Vagas"];

    if($vagas > 0){
        $query = "INSERT INTO inscritos (Nome, Evento, Presenca) VALUES ('$nome', '$evento', '$presenca')";
        $resultado = mysqli_query($connect, $query);

        $vagas_atuais = $vagas - 1;

        $query2 = "UPDATE eventos SET Vagas = '$vagas_atuais' WHERE Nome = '$evento'";
        $resultado2 = mysqli_query($connect, $query2);

        return $resultado;
    }
}
}

// listar pessoas incritas em um evento
function listarInscritos($dados){
    $connect = connect();

    $evento = $dados['evento'];

    $query = "SELECT * FROM inscritos WHERE Evento = '$evento'";
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

// confirmar presença no evento
function presenca($dados){
    $connect = connect();

    $evento = $dados['evento'];
    $nome = $dados['nome'];
    
    $sql = "SELECT * FROM inscritos WHERE Nome = '$nome' AND Evento = '$evento'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado->num_rows > 0) {
        $query = "UPDATE inscritos SET presenca = 'true' WHERE Nome = '$nome' AND Evento = '$evento'";
        $result = mysqli_query($connect, $query);

        return $result;
    }
    

}

// avaliar o evento
function avaliacao($dados){
    $connect = connect();

    $evento = $dados['evento'];
    $nome = $dados['nome'];
    $estrelas = $dados['estrelas'];
    $comentario = $dados['comentario'];
    
    $sql = "SELECT presenca FROM inscritos WHERE Nome = '$nome' AND Evento = '$evento'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado->num_rows > 0){
        $row = mysqli_fetch_assoc($resultado);
        $presenca = $row['presenca'];

        if($presenca == "true"){
            $sql = "INSERT INTO avaliacao (Nome,Evento, Estrelas, Comentario) VALUES ('$nome', '$evento', '$estrelas', '$comentario')";
            $result = mysqli_query($connect, $sql);
            return $result;
        }
    }

}



?>