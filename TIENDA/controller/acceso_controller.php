<?php

	isset($_POST["usuario"]) ? $usuario = $_POST["usuario"] : $usuario="";
	isset($_POST["contrasenia"]) ? $contrasenia = $_POST["contrasenia"] : $contrasenia="";
	isset($_POST["cerrarSesion"]) ? $cerrarSesion = $_POST["cerrarSesion"] : $cerrarSesion="";

	if($usuario!="" && $contrasenia!=""){
		
		require_once("../model/acceso_modelo.php");
		
		$acceso = new accesoModel();
		//Se verifica si se ingreso un correo o un usuario
		//FILTER_VAR devuelve el string ingresado si es correcto y FALSE si falla el filtro
		if(filter_var($usuario, FILTER_VALIDATE_EMAIL) === FALSE){ 
       		//Se ingreso un usuario
			echo $acceso->comprobarAccesoUsuario($usuario, $contrasenia);
							
	    }else{
	    	//Se ingreso un correo
			$acceso->comprobarAccesoCorreo($usuario, $contrasenia);
			echo "ERROR";
	    }
		//Se comprueba el acceso del usuario

		
	} else {
		if($cerrarSesion=="salir"){
			session_start();
			//unset($_SESSION["usuarioTienda"]);
            session_destroy();
			return;
			exit();
		}
		echo "ACCESO DENEGADO OBJETO VACIO";
	}
?>