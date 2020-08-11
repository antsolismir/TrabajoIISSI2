<?php
    session_start();

    include_once("gestionBD.php");
    include_once("gestionarUsuarios.php");

    if(!isset($_SESSION['rol']))
        Header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
    Pagina principal, eres un cliente.
</body>
