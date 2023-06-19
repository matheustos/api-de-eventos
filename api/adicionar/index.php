<?php
include 'C:\wamp64\www\api-de-eventos\src\Controller\AgendamentoController.php';

// Verifica se o usuário está autenticado e possui nível de acesso de administrador
if (!isset($_SESSION['id_admin'])) {
    $res = insertAgendamentoController($_POST);

    echo(json_encode($res));
}else{
    echo "O nome do evento deve ser informada";
}



?>
