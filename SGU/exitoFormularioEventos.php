<?php
	session_start();
	require 'php/validaciones.php';
	
	//Comprobamos que la fecha tiene un formato correcto. Si no lo tiene, redirección a errorBD.php
	if (!checkdate($_POST['fechaIniMes'], $_POST['fechaIniDia'], $_POST['fechaIniAnio']) || 
						!checkdate($_POST['fechaFinMes'], $_POST['fechaFinDia'], $_POST['fechaFinAnio']))
		header("location: errorBD.php");
	
	//Convertimos en un String cada elemento separado de la fecha inicio y fin
	$fechaInicioFormateada=$_POST['fechaIniDia']."/".$_POST['fechaIniMes']."/".$_POST['fechaIniAnio'];
	$fechaFinFormateada=$_POST['fechaFinDia']."/".$_POST['fechaFinMes']."/".$_POST['fechaFinAnio'];
	
	//Asignamos los valores que provienen del formulario a variables con nombres significativos que 
	//ayudan a la comprensión de la lectura de código
	$lugar=$_POST['lugar'];
	$hora=$_POST['hora'];
	$titulo=$_POST['title'];
	$cuerpo=$_POST['cuerpo'];
	$dni=$_SESSION['usuario'];
	
	//Escribimos el codigo que usará el objeto PDO para insertar una tupla en la clase eventos
	$insercion="INSERT INTO EVENTOS VALUES('$fechaInicioFormateada','$fechaFinFormateada','$lugar','$hora','$titulo','$cuerpo','$dni')";
	
	//Función que recibe un String con una inserción y la inserta en la BD. 
	//La definicion de la función se encuentra en php/validaciones.php
	insertaBD($insercion);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
				"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
		<title>OK</title>
		<!-- Date: 2012-06-05 -->
		<link rel="stylesheet" type="text/css" href="css/login.css" />
	</head>
	<body>
		
		<div id="div_error">
			<img  src="images/button_ok.png" alt="error"/>
			<h1>Se han añadido los datos correctamente.</h1>
			<p>Puede comprobar el evento <a href="calendario.php">aquí</a>. pinche  <a href="formularioEventos.php">aquí</a> para volver</p>
		</div>
		
	</body>
</html>
		