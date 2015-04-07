<?php
	//funcion que crea la cabecera básica de todas las paginas.
	/*toma como datos de entrada:
	 * $login: array que contiene los datos del usuario logeado.
	 * $nombrePestagna: Nombre que tendrá la pestaña en el navegador
	 * $nombreCSS: nombre del archivo CSS al que hará referencia la página para la maquetación
	 */
	function creaCabecera($login,$nombrePestagna,$nombreCSS){
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\"
				\"http://www.w3.org/TR/html4/strict.dtd\">
				<html lang=\"en\">
					<head>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" >
						<title>$nombrePestagna</title>
						<!-- Date: 2012-06-05 -->
						<link rel=\"stylesheet\" type=\"text/css\" href=$nombreCSS />
					</head>
					<body onload=\"javascript:carga()\">
							<div id=\"Header\">
								<h1><big>Sistema de gestión universitaria</big></h1>
								<div id=\"div_login\">
									<abbr>Usuario: $login[nombre]</abbr><br />
									<abbr>Categoría: $login[categoria] </abbr>
									<a href=\"logout.php\">Logout</a>
								</div>
							
							</div>";
	}
	//funcion que termina el documento html cerrando las etiquetas body y html
	function creaPie($login){
		echo "</body>
				</html>";
	}
	
	//funcion concreta que crea el contenido de la página de inicio
	function creaHome($login){
		echo "<button id=\"etssi\">
		 	 <img src=\"images/etssi.jpg\" alt=\"Escuela Informática\" width=\"170\" height=\"170\" align=\"middle\"/>
		 	 </button>
		 	 <button id=\"fisica\">
		 	 <img src=\"images/UsFisica.JPG\" alt=\"Facultad de Física\" width=\"170\" height=\"170\" align=\"middle\"/>
		 	 </button>
		 	 <button id=\"mates\">
		 	 <img src=\"images/UsMates.JPG\" alt=\"Facultad de Matemáticas\" width=\"170\" height=\"170\" align=\"middle\"/>
		 	 </button>
		 	 <button id=\"biologia\">
		 	 <img src=\"images/Usbiologia.jpg\" alt=\"Facultad de Biología\" width=\"170\" height=\"170\" align=\"middle\"/>
		 	 </button>
		 	 <div id=\"Foot\">
	 	 	<p>
	 	 		Una plataforma para poder consultar todo lo que tu quieras y cuando quieras. Hecha para todos los usuarios que pertenzcan a la Universidad de Sevilla.
	 	 	</p>
	 	 </div>";
	}

//funcion que crea los menus desplegables en funcion de la categoria del usuario que se haya logeado
function creaMenu($login){
	echo "<div id=\"menuarriba\">
    <ul class=\"navi1\">
    	<li><a href=\"#inicio\">Inicio</a></li>
    	<li><a href=\"#inicio\" target=\"_self\" onclick=\"javascript:despliega3('evento')\">Eventos</a></li>
    </ul>
    	<ul id=\"evento\">";
		
if($login['categoria']=="profesor" || $login['categoria']=="pas"){
	echo "<li><a href=\"formularioEventos.php\">Crear evento</a></li>";
}
    	
echo "<li><a href=\"calendario.php\" onmouseout=\"javascript:ocultamenu3('evento')\">Calendario de Eventos</a></li>
   		</ul>
   		<ul class=\"navi1\">
    	<li><a href=\"#inicio\" target=\"_self\" onclick=\"javascript:despliega('matriculas')\"id=\"matricula\">Matricula</a></li>
    </ul>
    <ul id=\"matriculas\">";
	
if($login['categoria']=="alumno")
    	echo "<li><a href=\"http://www.us.es\" target=\"_blank\">Consulta matricula</a></li>";
    	 
if($login['categoria']=="pas")
   		echo "<li><a href=\"http://www.us.es\" target=\"_blank\">Crear matricula</a></li>";

if($login['categoria']=="profesor")
   		echo "<li><a href=\"http://www.us.es\" target=\"_blank\" onmouseout=\"javascript:ocultamenu('matriculas')\">Calificar</a></li>";
		
	echo "</ul>
	<ul class=\"navi1\">
    	<li><a href=\"#inicio\" target=\"_self\" onclick=\"javascript:despliega2('reservas')\" id=\"reserva\">Reserva</a></li>
   	</ul>
   	<ul id=\"reservas\">
   		<li><a href=\"error.php\" target=\"_blank\">Comedor</a></li>
   		<li><a href=\"error.php\" target=\"_blank\">Parking</a></li>
    	<li><a href=\"error.php\" target=\"_blank\">Libros</a></li>
    	<li><a href=\"error.php\" target=\"_blank\">Salas</a></li>
    	<li><a href=\"error.php\" target=\"_blank\" onmouseout=\"javascript:ocultamenu2('reservas')\">Consultar reservas</a></li>
    </ul>
    <ul class=\"navi1\">
    	<li><a href=\"error.php\" target=\"_blank\">Da tu opinión</a></li>
	</ul>
</div>

 	 <script type=\"text/javascript\" src=\"javascript/comprobadores.js\"></script>";
}

//función que crea el formulario de la página formularioEventos.php
function creaFormEventos($login){
	echo "<div name=\"formEvent\" id=\"div_form_event\">
			<form method=\"post\" action=\"exitoFormularioEventos.php\" onsubmit=\"return compruebaFormEventos()\">
				<fieldset>
				<legend>Crea tu Evento:</legend>
				<div id=\"div_datos\">
					<div id=\"Title\">
						<div id=\"div_err1\" class=\"errorFormulario\"></div>
						<label id=\"titulo\" for=\"title\">Titulo:</label>
						<input id=\"titulo_text\" class=\"title\" name=\"title\" type=\"text\"  maxlength=\"50\"/>
					</div>
					<div id=\"Site\">
						<div id=\"div_err2\" class=\"errorFormulario\"></div>
						<label id=\"Lugar\" for=\"lugar\">Lugar:</label>
						<input id=\"lugar_text\" class=\"lugar\" name=\"lugar\" type=\"text\" maxlength=\"40\"/>
					</div>
					<div id=\"Time\">
						<label id=\"Hora\" for=\"hora\">Hora:</label>
						<select value=\"horas\" name=\"hora\">
 							<option selected=\"selected\">07:00</option>
 							<option>07:30</option>
  							<option>08:00</option>
  							<option>08:30</option>
  							<option>09:00</option>
  							<option>09:30</option>
  							<option>10:00</option>
  							<option>10:30</option>
  							<option>11:00</option>
  							<option>11:30</option>
  							<option>12:00</option>
  							<option>12:30</option>
  							<option>13:00</option>
  							<option>13:30</option>
  							<option>14:00</option>
  							<option>14:30</option>
  							<option>15:00</option>
  							<option>15:30</option>
  							<option>16:00</option>
  							<option>16:30</option>
  							<option>17:00</option>
  							<option>17:30</option>
  							<option>18:00</option>
  							<option>18:30</option>
  							<option>19:00</option>
  							<option>19:30</option>
  							<option>20:00</option>
  							<option>20:30</option>
  							<option>21:00</option>
  							<option>21:30</option>
  							<option>22:00</option>
  							<option>22:30</option>
  						</select>
					<div id=\"Date\">
						<div id=\"div_err3\" class=\"errorFormulario\"></div>
						<label id=\"fecha\" for=\"fecha\">Fecha Inicio:</label>
						<select value=\"fechaDia\" id=\"fechaIniDia\" name=\"fechaIniDia\">
 							<option selected=\"selected\">01</option>
 							<option>02</option>
  							<option>03</option>
  							<option>04</option>
  							<option>05</option>
  							<option>06</option>
  							<option>07</option>
  							<option>08</option>
  							<option>09</option>
  							<option>10</option>
  							<option>11</option>
  							<option>12</option>
  							<option>13</option>
  							<option>14</option>
  							<option>15</option>
  							<option>16</option>
  							<option>17</option>
  							<option>18</option>
  							<option>19</option>
  							<option>20</option>
  							<option>21</option>
  							<option>22</option>
  							<option>23</option>
  							<option>24</option>
  							<option>25</option>
  							<option>26</option>
  							<option>27</option>
  							<option>28</option>
  							<option>29</option>
  							<option>30</option>
  							<option>31</option>
  						</select>
  						<select value=\"fechaMes\" id=\"fechaIniMes\" name=\"fechaIniMes\">
 							<option selected=\"selected\">01</option>
 							<option>02</option>
  							<option>03</option>
  							<option>04</option>
  							<option>05</option>
  							<option>06</option>
  							<option>07</option>
  							<option>08</option>
  							<option>09</option>
  							<option>10</option>
  							<option>11</option>
  							<option>12</option>
  						</select>
  						<select value=\"fechaAño\" id=\"fechaAnioIni\" name=\"fechaIniAnio\">
 							<option selected=\"selected\">2012</option>
 							<option>Not Found,All Dead</option>
  						</select>
					</div>
					<div id=\"DateF\">
						<label id=\"fechaF\" for=\"fecha2\">Fecha Final:</label>
						<select value=\"fechaDia\" id=\"fechaFinDia\" name=\"fechaFinDia\">
 							<option selected=\"selected\">01</option>
 							<option>02</option>
  							<option>03</option>
  							<option>04</option>
  							<option>05</option>
  							<option>06</option>
  							<option>07</option>
  							<option>08</option>
  							<option>09</option>
  							<option>10</option>
  							<option>11</option>
  							<option>12</option>
  							<option>13</option>
  							<option>14</option>
  							<option>15</option>
  							<option>16</option>
  							<option>17</option>
  							<option>18</option>
  							<option>19</option>
  							<option>20</option>
  							<option>21</option>
  							<option>22</option>
  							<option>23</option>
  							<option>24</option>
  							<option>25</option>
  							<option>26</option>
  							<option>27</option>
  							<option>28</option>
  							<option>29</option>
  							<option>30</option>
  							<option>31</option>
  						</select>
  						<select value=\"fechaMes\" id=\"fechaFinMes\" name=\"fechaFinMes\">
 							<option selected=\"selected\">01</option>
 							<option>02</option>
  							<option>03</option>
  							<option>04</option>
  							<option>05</option>
  							<option>06</option>
  							<option>07</option>
  							<option>08</option>
  							<option>09</option>
  							<option>10</option>
  							<option>11</option>
  							<option>12</option>
  						</select>
  						<select value=\"fechaAño\" id=\"fechaAnioFin\" name=\"fechaFinAnio\">
 							<option selected=\"selected\">2012</option>
 							<option>Not Found,All Dead</option>
  						</select>
					</div>
  						
					</div>
					<div id=\"body\">
						<div id=\"div_err4\" class=\"errorFormulario\"></div>
						<label id=\"Cuerpo\" for=\"cuerpo\">Descripcion:</label>
					</div>
						<textarea name=\"cuerpo\" id=\"descripcion\" rows=\"10\" cols=\"50\"></textarea>
					<div id=\"Submit\">
						<input id=\"submit\" value=\"Aceptar\" type=\"submit\"/>
					</div>
				</div>
				</fieldset>
			</form>
		</div>
		<div id=\"Foot\">
		 	 	<p>
		 	 		Una plataforma para poder consultar todo lo que tu quieras y cuando quieras. Hecha para todos los usuarios que pertenzcan a la Universidad de Sevilla.
		 	 	</p>
		 	 </div>";
}

//funcion que genera una tabla informativa con todos los eventos que se encuentran en la base de datos
function creaCalendarioEventos($login){
	 echo "<div id=\"div_tabla\"><table id=\"tablaCalendario\">
				<tr>
				<th>Fecha inicio</th>
				<th>Fecha final</th>
				<th>Lugar</th>
				<th>Hora</th>
				<th>Titulo</th>
				<th>Cuerpo</th>
				</tr>";
	$consulta="SELECT * FROM EVENTOS";
	$statement=consultaBD($consulta);
	foreach($statement as $key){
	  echo "<tr>
				<td>$key[FECHA_INICIO]</td>
				<td>$key[FECHA_FIN]</td>
				<td>$key[LUGAR]</td>
				<td>$key[HORA]</td>
				<td>$key[TITULO]</td>
				<td>$key[CUERPO]</td>
			</tr>";
	}
	echo "</table></div>
			<div id=\"Foot\">
		 	 	<p>
		 	 		Una plataforma para poder consultar todo lo que tu quieras y cuando quieras. Hecha para todos los usuarios que pertenzcan a la Universidad de Sevilla.
		 	 	</p>
		 	 </div>";
}
?>











