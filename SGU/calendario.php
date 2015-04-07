<?php
	session_start();
	
	//Código de control de acceso, que impide a un usuario deslogeado acceder a esta página.
	if(!isset($_SESSION['usuario']) || !isset($_SESSION['categoria']))
		header("location: login.html");
	
	//importación requerida de los archivos validaciones.php y plantillas.php
	require 'php/validaciones.php';
	require 'php/plantillas.php';
	
	//Creamos un array $login, que se usará en las funciones plantilla más abajo como datos de entrada
	$login['usuario']=$_SESSION['usuario'];
	$login['categoria']=$_SESSION['categoria'];
	$login['nombre']=$_SESSION['nombre'];
?>

<?php
	/*Usamos plantillas con el fin de encapsular el código que pueda repetirse. Estas funciones
	 *se encuentran en php/plantillas.php
	 */
	creaCabecera($login,"calendario de eventos","css/estilo_menu_cabecera.css");
	creaCalendarioEventos($login);
	creaMenu($login);
	creaPie($login);
?>
