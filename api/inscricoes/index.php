<?php 
include 'C:\wamp64\www\api-de-eventos\src\Controller\inscricoesController.php';

$res = InscricaoController($_POST);

echo(json_encode($res));

?>