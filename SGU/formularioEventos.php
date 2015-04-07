<?php
	session_start();
	
	//Código de control de acceso, que impide a un usuario deslogeado acceder a esta página.
	if(!isset($_SESSION['usuario']) || !isset($_SESSION['categoria']))
		header("location: login.html");
	
	//Adicionalmente, si el usuario tiene la categoría de alumno, tampoco podrá acceder.
	if($_SESSION['categoria']=="alumno")
		header("location: acceso_denegado.php");
	
	
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
	creaFormEventos($login);
	creaMenu($login);
	creaPie($login);
	
?>