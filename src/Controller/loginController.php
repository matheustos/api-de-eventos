<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\login.php';
include 'C:\wamp64\www\api-de-eventos\validators\validacaoLogin.php';

function loginController($dados){
    $erros = validaLogin($dados);
    if(count($erros) > 0) {
        return formatarRetornoLogin(false, [], $erros);
    } else {
        if(!login($dados)){ 
            return formatarRetornoLogin(false, [], "usuario e/ou senha invalidos.");
        } else {
            return formatarRetornoLogin(true, [], "login realizado com sucesso.");
            }
        };
    }

function formatarRetornoLogin($success, $content, $errors = [])
{
    return [
        "success" => $success,
        "content" => $content,
        "errors" => $errors
    ];
}


?>