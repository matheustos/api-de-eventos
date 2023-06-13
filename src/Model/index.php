<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\db_connect.php';
/*
function getProdutos()
{
    $connect = connect();

    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($connect, $sql);

    $produtos = [];

    while ($produto = mysqli_fetch_object($resultado)) {
        $produtos[] = $produto;
    }

    return $produtos;
}

function getProdutoById($id)
{
    $connect = connect();

    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);

    $produto = mysqli_fetch_object($resultado);

    return $produto;
}
*/
function insereAgendamento($agendamento)
{
    $connect = connect();

    $nome = $agendamento["nome"];
    $data_hora_inicio = $agendamento["data_hora_inicio"];
    $data_hora_termino = $agendamento["data_hora_termino"];
    $local = $agendamento["local"];
    $descricao = $agendamento["descricao"];
    $vagas = $agendamento["vagas"];
    $categoria = $agendamento["data_hora_termino"];


    $sql = "INSERT INTO eventos (Nome, Inicio, Termino, Local, Descricao, vagas, Categoria) VALUES ('$nome', '$data_hora_inicio', '$data_hora_termino', '$local', '$descricao', '$vagas', '$categoria')";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;
} 
/*

function removeProdutosDoEstoque($id, $quantidade)
{
    $connect = connect();

    $sql = "UPDATE produtos SET estoque = estoque - $quantidade WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);

    return $resultado;
}

function temProdutosSuficientes($id, $quantidade)
{
    $connect = connect();

    $sql = "SELECT * FROM produtos WHERE id = $id AND estoque >= $quantidade";
    $resultado = mysqli_query($connect, $sql);

    $produto = mysqli_fetch_object($resultado);

    if($produto) {
        return true;
    } else {
        return false;
    }
}





*/



?>