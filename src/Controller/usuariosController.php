<?php 
include '../../validators/validacaoUsuarios.php';
include 'C:\wamp64\www\api-de-eventos\src\Model\usuarios.php';


function cadastroUsuarioController($user){
    $erros = validaUsuario($user);
    if(count($erros) > 0) {
        return formatarRetorno(false, [], $erros);
    } else {
        if(cadastroUsuario($user)){
            return formatarRetornoUser(true, "Usuario cadastrado com sucesso");
        } else {
            return formatarRetornoUser(false, [], "Erro ao cadastrar usuario");
        }
        };
}

function formatarRetornoUser($success, $content, $errors = [])
{
    return [
        "success" => $success,
        "content" => $content,
        "errors" => $errors
    ];
}



?>