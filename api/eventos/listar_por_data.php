<?php 
include 'C:\wamp64\www\api-de-eventos\src\Model\eventos.php';



$res = listarPorData($_POST);

echo(json_encode($res));


?>