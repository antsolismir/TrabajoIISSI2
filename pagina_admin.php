<?php
session_start();

require_once("gestionarHorarios.php");

if (!isset($_SESSION['rol']))
    Header("Location: login.php");
else {
    if ($_SESSION['rol'] != "ADM") {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>

    </head>
    <body>
        Eres un admin.
    </body>
</html>