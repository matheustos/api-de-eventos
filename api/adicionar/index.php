<?php
include 'C:\wamp64\www\api-de-eventos\src\Controller\AgendamentoController.php';



$res = insertAgendamentoController($_POST);

echo(json_encode($res));

    






?>
