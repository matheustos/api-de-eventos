<?php 

include 'C:\wamp64\www\api-de-eventos\src\Controller\inscricaoController.php';

$res = presencaController($_POST);

echo(json_encode($res));



?>