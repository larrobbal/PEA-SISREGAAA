<!DOCTYPE HTML>
<html>
	<script src="js/values.js" type="text/javascript"></script>
	<head>
		<title>Añadir Horas - SISREGAA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/divisores.css"/>
		<link rel="stylesheet" href="css/formas.css">
	</head>
	<body onload="loadFunc()">
	<div class="menu" id="navBar"></div>
		<div class="divCont">
			<form class="insertar">
				<fieldset>
					<legend>Crea un nuevo periodo</legend>
					<p>Periodo<br>Inicio<input type="date" value="<?php echo date("Y-m-d");?>" name="inicio" id="inicio"> - <input type="date"  value="<?php echo date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")+13, date("Y")));?>" name="fin" id="fin"></p>
					
				</fieldset>
			</form>
			<button id="enviaPeriodo" name="enviaPeriodo" onclick="creaPeriodo()">Crear</button>		
			<form class="insertar">	
				<fieldset>
					<legend>Añadir horas</legend>
					<p >Asesor <select id="nombreAsesor" name="nombreAsesor"></select></p>
					<p>Periodo <select id="periodo" name="periodo"></select></p>
					<p>Horas de Asesoria <input type="text" id="horas" name="horas"></p>
				</fieldset>
			</form>
			<button id="enviarHoras" name="enviarHoras" onclick="addHoras()">Añadir</button>
			
			<div id=result></div>
		</div>
	</body>
</html>