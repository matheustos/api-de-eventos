<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';

function inscricao($dados){

    $connect = connect();


    $evento = $dados['evento'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    $presenca = "false";

    $sql = "SELECT * FROM eventos WHERE Nome = '$evento'";
    $resultado = mysqli_query($connect, $sql);

// Verifica se há resultados e exibe o dado desejado
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $vagas = $row["Vagas"];

    if($vagas > 0){
        $query = "INSERT INTO inscritos (Nome, Email, Evento, Presenca) VALUES ('$nome', '$email', '$evento', '$presenca')";
        $resultado = mysqli_query($connect, $query);

        $vagas_atuais = $vagas - 1;

        $query2 = "UPDATE eventos SET Vagas = '$vagas_atuais' WHERE Nome = '$evento'";
        $resultado2 = mysqli_query($connect, $query2);

        return $resultado;
    }
}
}

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

function presenca($dados){
    $connect = connect();

    $evento = $dados['evento'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    
    $sql = "SELECT * FROM inscritos WHERE Nome = '$nome' AND Email = '$email' AND Evento = '$evento'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado->num_rows > 0) {
        $query = "UPDATE inscritos SET presenca = 'true' WHERE Nome = '$nome' AND Email = '$email' AND Evento = '$evento'";
        $result = mysqli_query($connect, $query);

        return $result;
    }
    

}

function avaliacao($dados){
    $connect = connect();

    $evento = $dados['evento'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    $estrelas = $dados['estrelas'];
    $comentario = $dados['comentario'];
    
    $sql = "SELECT presenca FROM inscritos WHERE Nome = '$nome' AND Email = '$email' AND Evento = '$evento'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado->num_rows > 0){
        $row = mysqli_fetch_assoc($resultado);
        $presenca = $row['presenca'];

        if($presenca == "true"){
            $sql = "INSERT INTO avaliacao (Nome, Email, Evento, Estrelas, Comentario) VALUES ('$nome', '$email', '$evento', '$estrelas', '$comentario')";
            $result = mysqli_query($connect, $sql);
            return $result;
        }
    }

}



?>