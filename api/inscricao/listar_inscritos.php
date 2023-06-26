<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\inscricao.php';


$res = listarInscritos($_POST);

echo(json_encode($res));


?>