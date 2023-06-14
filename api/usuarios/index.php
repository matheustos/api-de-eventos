<?php
include 'C:\wamp64\www\api-de-eventos\src\Controller\usuariosController.php';

$res = cadastroUsuarioController($_POST);

echo(json_encode($res));


?>