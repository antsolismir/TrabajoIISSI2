<?php
session_start();

require_once("gestionarHorarios.php");

if (!isset($_SESSION['rol']))
    Header("Location: login.php");
else {
    if ($_SESSION['rol'] != "EMP") {
        header("Location: login.php");
    } else {}
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>

    </head>
    <body>
        Eres un empleado.
    </body>
</html>