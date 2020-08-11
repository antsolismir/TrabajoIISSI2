<?php

 function alta_usuario($conexion,$usuario) {
	try {
		$consulta = "CALL INSERTAR_CLIENTE(:nick, :pass, :nombre, :apellido, :correo, :telefono, :cuentaBancaria, :direccion)";
        
        $stmt=$conexion->prepare($consulta);
        
        $stmt->bindParam(':nick',$usuario["nickname"]);
		$stmt->bindParam(':pass',$usuario["contrasena"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':apellido',$usuario["apellido"]);
		$stmt->bindParam(':correo',$usuario["correo"]);
		$stmt->bindParam(':telefono',$usuario["telefono"]);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':cuentaBancaria',$usuario["cuentaBancaria"]);
		$stmt->bindParam(':direccion',$usuario["direccion"]);
		
		$stmt->execute();
		
		return true;
	} catch(PDOException $e) {
		return false;
		$e->getMessage();	// Si queremos visualizar la excepción durante la depuración: $e->getMessage();
    }
}

function consultarUsuario($conexion,$nick,$passw) {
	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE NICKNAME =: nickname AND PASS =: pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':nickname',$nick);
	$stmt->bindParam(':pass',$passw);
	$stmt->execute();
	return $stmt->fetchColumn();
}

function añadir1($conexion,$nick,$passw) {
	try {
		$consulta = "CALL INSERTAR_US(:nickname, :pass)";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nickname',$nick);
		$stmt->bindParam(':pass',$passw);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
	}
}

function consultarRol($conexion,$usu) {
	try {
		$consulta = "SELECT rol FROM USUARIOS WHERE NICKNAME=:usu";
		$stmt = $conexion->prepare($consulta);
		$stmt -> bindParam(':usu',$usu);
		$stmt -> execute();
		$result = $stmt->fetch();

		return $result["ROL"];
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}