<!DOCTYPE HTML>
<html>
    <script src="js/values.js" type="text/javascript"></script>
	<head>
		<title>Elimina Asesor - SISREGAA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
        <meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/divisores.css">
        <link rel="stylesheet" href="css/formas.css">
	</head>
	<body onload="load2()">
		<div class="menu" id="navBar"></div>
		<div class="divCont">
            <form class="modifica" id="modificaUsuario" name="modificaUsuario">
                <select id="nombreAsesor" name="nombreAsesor" onchange="fillForm()"></select>
                <p>Matricula <input type="text" name="matricula" id="matricula" readonly></p>
				<p>Nombre de Asesor <input type="text" name="nombre" id="nombre" readonly></p>
				<p>Apellido Paterno <input type="text" name="paterno" id="paterno" readonly></p>
                <p>Apellido Materno <input type="text" name="materno" id="materno" readonly></p>
                <p>Telefono <input type="text" name="telefono" id="telefono" readonly></p>
                <p>E-mail <input type="text" name="email" id="email" readonly></p>
                <p>Carrera <input type="text" name="carrera" id="carrera" readonly></p>
                <p>Division <input type="text" name="division" id="division" readonly></p>
            </form>
            <button id="enviar" name="enviar" onclick="deleteUsuario();">Enviar</button>
        </div>
        
	</body>
</html>