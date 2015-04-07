<?php
	//funcion de validacion que se usa cuando se logea un usuario
	function validaLogin(){
		
		//Asignamos los valores que provienen del formulario a variables con nombres significativos que 
		//ayudan a la comprensión en la lectura de código
		$dni=$_POST['usuario'];
		$pass=$_POST['pass'];
		
		//Si no se ha introducido algo en el campo dni o password del formulario de login.html, devolverá un error
		if(!isset($dni) || !isset($pass))
			header("location: error.php");
		else{
			try{
				//creamos objeto PDO
				$con=new PDO('oci:dbname=localhost/XE','FRACARCHA','r4V3nG3r');
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				//realizamos la consulta en la base de datos
				$statement=$con->prepare("SELECT count(*) FROM USUARIOS WHERE DNI=:dni AND PASS=:pass");
				$statement->execute(array(':dni' => $dni,':pass' => $pass));
				$es_usuario;
				foreach ($statement as $fila) {
					$es_usuario= $fila['COUNT(*)'];
				}
				if($es_usuario!=0){
					//guardamos en la sesion el dni del usuario
					$_SESSION['usuario']=$dni;
					
					//consultamos si el usuario es un alumno
					$statement_alumno=$con->prepare("SELECT count(*) FROM ALUMNOS WHERE DNI=:dni");
					$statement_alumno->execute(array(':dni' => $dni));
					$es_alumno;
					foreach ($statement_alumno as $fila) {
						$es_alumno=$fila['COUNT(*)'];
					}
					if($es_alumno==1)
						$_SESSION['categoria']='alumno';
					
					//consultamos si el usuario es un PAS
					$statement_pas=$con->prepare("SELECT count(*) FROM PAS WHERE DNI=:dni");
					$statement_pas->execute(array(':dni' => $dni));
					$es_pas;
					foreach ($statement_pas as $fila) {
						$es_pas=$fila['COUNT(*)'];
					}
					if($es_pas==1)
						$_SESSION['categoria']='pas';
						
					//consultamos si el usuario es profesor
					$statement_profesor=$con->prepare("SELECT count(*) FROM PROFESORES WHERE DNI=:dni");
					$statement_profesor->execute(array(':dni' => $dni));
					$es_profesor;
					foreach ($statement_profesor as $fila) {
						$es_profesor=$fila['COUNT(*)'];
					}
					if($es_profesor==1)
						$_SESSION['categoria']='profesor';
					
					//Nos quedamos con el nombre del usuario
					$statement_nombre=$con->prepare("SELECT NOMBRE FROM USUARIOS WHERE DNI=:dni");
					$statement_nombre->execute(array(':dni' => $dni));
					$nombre;
					foreach ($statement_nombre as $fila) {
						$nombre=$fila['NOMBRE'];
					}
					$_SESSION['nombre']=$nombre;
					
					//cerramos la conexion con la BD
					$con=null;
				}else{
					//cerramos y redirigimos a una pagina de error
					$con=null;
					header("location: error.php");
				}
				
				
			}catch(PDOException $e){
				//capturamos posibles excepciones
				echo "error de acceso a la base de datos: ".$e->GetMessage();
			}
			
			//preparamos un array de salida
			$categoria=$_SESSION['categoria'];
			$nombre_usuario=$_SESSION['nombre'];
			$resultado=array('usuario' => $dni,'pass' => $pass,'categoria' => $categoria,'nombre' => $nombre_usuario);
			
		}
	
	return $resultado;
	}

	//funcion que realiza una consulta a la base de datos con el dato de entrada y devuelve un statement
	function consultaBD($consulta){
		try{
			//creamos el objeto PDO
			$con=new PDO('oci:dbname=localhost/XE','FRACARCHA','r4V3nG3r');
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			//ejecutamos la consulta y preparamos un statement
			$statement=$con->query($consulta);
			
			//cerramos la conexión con la BD
			$con=null;
		}catch(PDOException $e){
			//echo "error de acceso a la base de datos: ".$e->GetMessage();
			header("location: errorBD.php");
		}
		
		//devolvemos la consulta
		return $statement;
	}
	
	//funcion que realiza una insercion a la base de datos con el dato de entrada y devuelve true si se ha realizado
	//correctamente
	function insertaBD($insercion){
		$resultado=true;
		try{
			//creamos el objeto PDO
			$con=new PDO('oci:dbname=localhost/XE','FRACARCHA','r4V3nG3r');
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			//ejecutamos la inserción
			$con->exec($insercion);
			
			//realizamos un commit
			//$con->commit();
			
			//cerramos la conexión con la BD
			$con=null;
		}catch(PDOException $e){
			$resultado=false;
			//echo "error de escritura a la base de datos: ".$e->GetMessage();
			header("location: errorBD.php");
		}
		return $resultado;
	}
?>
