<!DOCTYPE HTML>
<html>
	<head>
		<title>Consulta Avance - SISREGAA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content=""/>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/divisores.css">
		<link rel="stylesheet" href="css/formas.css">
	</head>
	<script src="js/values.js" type="text/javascript"></script>
	<body onload="load2()">
	<div class="menu" id="navBar"></div>
		<div class="divCont">
            <form class="consulta">
				<p>Asesor <select id="nombreAsesor" name="nombreAsesor"></select></p>
            </form>
			<button id="enviar" class="enviar" onclick="consultaHistorial()">Consultar</button>
			<p>Historial</p>
			<div id="divHistorial"></div>
        </div>
	</body>
</html>