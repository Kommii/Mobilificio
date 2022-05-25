<?php
session_start();
global $data;
$utente=$data['result'];
if($utente[4] && password_verify($data['pass'], $utente[5]))
{
    $_SESSION['username'] = $utente[4];
    $_SESSION['password'] = $data['pass'];
    $_SESSION['cliente_id'] = $utente[0];
    $_SESSION['admin']=$utente[6];
    header("location: /mobilificio");
    echo("ok");
}
else{
    echo("not ok");
    header("location: /mobilificio/home/login");
}   

?>