<?php 

include 'C:\wamp64\www\api-de-eventos\src\Controller\loginController.php';


$res = loginController($_POST);

echo(json_encode($res));
?>