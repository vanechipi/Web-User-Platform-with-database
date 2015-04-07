<?php
	//Documento php que deslogea al usuario y lo manda a la página login.html
	session_start();
	$_SESSION[usuario]=null;
	$_SESSION[categoria]=null;
	
	header("location: login.html");
?>