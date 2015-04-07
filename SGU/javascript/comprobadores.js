/*funcion que comprueba si tanto el campo DNI como el password se ha insertado algún dato, de no ser así
*la funcion avisa al usuario de su error y devuelve false, lo que impide a la página que envíe los datos
*al servidor
*/
function compruebaLogin(){
	var resultado=true;
	var textoError1="";
	var textoError2="";
	
	var usuario=document.getElementById('usuario').value;
	var password=document.getElementById('password').value;
	
	if(usuario==""){
			resultado=false;
			textoError1="Debe introducir su DNI."
			var error1=document.createTextNode(textoError1);
			if(!document.getElementById('errorNombre').hasChildNodes())
				document.getElementById("errorNombre").appendChild(error1);
		}
	
	
	if (password==""){
		resultado=false;
		textoError2="Debe introducir una contraseña."
		var error2=document.createTextNode(textoError2);
		if(!document.getElementById('errorPass').hasChildNodes())
			document.getElementById("errorPass").appendChild(error2);
	}
	
	document.getElementById('field').style.height="13em";
	
	return resultado;
}

//Las funciones ocultamenu ocultan las listas de enlaces indicadas cuando el ratón se encuentra fuera de las mismas.
function ocultamenu(){ 
var menu1= document.getElementById('matriculas') 
menu1.style.display = "none";
}

function ocultamenu2(){
	var menu = document.getElementById('reservas');
    menu.style.display = "none"; 
}

function ocultamenu3(){
   var menu3 = document.getElementById('evento');
   menu3.style.display = "none"; 
}

//Función que oculta listas de enlaces en cuanto la página carga
function carga(){
	document.getElementById('matriculas').style.display="none";
	document.getElementById('reservas').style.display="none";
	document.getElementById('evento').style.display="none";
}

//Las funciones despliega realizan el proceso contrario a las funciones oculta, con la variante de que deben 
//ser clickados ciertos botones para que aparezcan
function despliega(){ 
	var menu1= document.getElementById('matriculas');
 	if(menu1.style.display == "none"){ 
  		menu1.style.display = "block"; 
 	} 
 	else{ 
   		menu1.style.display = "none"; 
 	}
}
    
function despliega2(){
     var menu= document.getElementById('reservas'); 
     if(menu.style.display == "none"){
     	menu.style.display = "block";
     } 
     else{
     	menu.style.display = "none";
     }
}
    
function despliega3(){
  	 var menu3= document.getElementById('evento'); 
     if(menu3.style.display == "none"){
     	menu3.style.display = "block";
     } 
     else{
     	menu3.style.display = "none";
     }
}

//Comprobador que supervisa que los datos que se envían al servidor están correctos, y de no ser así,
//avisará del error en el campo donde se dé y evitará que se envíen los datos al servidor
function compruebaFormEventos(){
	var resultado=true;
	
	var textNombre=document.getElementById("titulo_text").value;
	var textLugar=document.getElementById("lugar_text").value;
	var textDescripcion=document.getElementById("descripcion").value;
	
	if(textNombre==""){
		resultado=false;
		var textoError="Debe introducir un titulo."
		var error=document.createTextNode(textoError);
		if(!document.getElementById('div_err1').hasChildNodes())
			document.getElementById("div_err1").appendChild(error);
	}
	
	if(textLugar==""){
		resultado=false;
		var textoError="Debe introducir un lugar."
		var error=document.createTextNode(textoError);
		if(!document.getElementById('div_err2').hasChildNodes())
			document.getElementById("div_err2").appendChild(error);
	}
	
	if(textDescripcion==""){
		resultado=false;
		var textoError="Debe dar una explicación."
		var error=document.createTextNode(textoError);
		if(!document.getElementById('div_err4').hasChildNodes())
			document.getElementById("div_err4").appendChild(error);
	}
	
	var anioInicio=document.getElementById("fechaAnioIni").value;
	var anioFin=document.getElementById("fechaAnioFin").value;
	
	var mesInicio=document.getElementById("fechaIniMes").value;
	var mesFin=document.getElementById("fechaFinMes").value;
	
	var diaInicio=document.getElementById("fechaIniDia").value;
	var diaFin=document.getElementById("fechaFinDia").value;
	
	if(anioInicio != 2012 || anioFin != 2012){
		resultado=false;
		var textoError="Seamos serios...";
		var error=document.createTextNode(textoError);
		if(document.getElementById("div_err3").hasChildNodes())
			document.getElementById("div_err3").removeChild(document.getElementById("div_err3").childNodes[0]);
		document.getElementById("div_err3").appendChild(error);
	}else if(mesInicio > mesFin || (mesInicio <= mesFin && diaInicio > diaFin)){
		resultado=false;
		var textoError="El día de comienzo no puede ser mayor que el día de finalización";
		var error=document.createTextNode(textoError);
		if(document.getElementById("div_err3").hasChildNodes())
			document.getElementById("div_err3").removeChild(document.getElementById("div_err3").childNodes[0]);
		document.getElementById("div_err3").appendChild(error);
	}
	
	return resultado;
}













