<?php
	//Validamos los datos introducidos en login.html con la función validaLogin(), situada en php/validaciones.php
	session_start();
	require 'php/validaciones.php';
	require 'php/plantillas.php';
	$login=validaLogin();
?>
<?php
	/*Usamos plantillas con el fin de encapsular el código que pueda repetirse. Estas funciones
	 *se encuentran en php/plantillas.php
	 */
	creaCabecera($login,"Sistema de gestión universitaria","css/estilo_menu_cabecera.css");
	creaHome($login);
	creaMenu($login);
	creaPie($login);
?>







