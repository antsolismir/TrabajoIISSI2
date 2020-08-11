<?php
    session_start();

    include_once("gestionBD.php");
    include_once("gestionarUsuarios.php");

    if(isset($_POST['submit'])) {
        $nick = $_POST['nick'];
        $passw = $_POST['pass'];

        $conexion = crearConexionBD();
        $num_usuarios = consultarUsuario($conexion, $nick, $passw);
        $rol = consultarRol($conexion,$nick);
        cerrarConexionBD($conexion);

        if ($num_usuarios == 0) {
            $login = 'error';
        } else {

            if($rol == "CLI") {
                $_SESSION['rol'] = $rol;
                Header("Location: index.php");
            } elseif ($rol == "ADM") {
                $_SESSION['rol'] = $rol;
                Header("Location: pagina_admin.php");
            } else {
                $_SESSION['rol'] = $rol;
                Header("Location: pagina_empleado.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Casa Marquez Empleados - Login</title>
    <meta charset="utf-8">
</head>
<body>
    <div id = "formulario">

    <?php

        if(isset($login)) {
            echo "<div class=\"error\">";
            echo "Error en la contraseña o no existe el usuario.";
            echo "</div>";
            echo $num_usuarios;
            echo "<br>";
            echo gettype($nick);
            echo "<br>";
            echo gettype($passw);
            echo "<br>";
        }

    ?>

    <form method="POST" action="login.php">
        <label>Nombre de usaurio:</label><input type="text" name="nick" id="nick" placeholder="Introduce el nombre de usuario">
        <label>Contraseña:</label><input type="password" name="pass" id="pass" placeholder="*********">
        <input type="submit" name="submit" value="submit">
    </form>
    </div>

    <p>¿No estas registrado? <a href="registrarse.php">Pincha aquí</a></p>
</body>
</html>