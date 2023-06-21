<!DOCTYPE HTML>
<html>
    <script src="js/values.js" type="text/javascript"></script>
	<head>
		<title>Añadir Asesor - SISREGAA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
        <meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/divisores.css">
        <link rel="stylesheet" href="css/formas.css">
	</head>
	<body onload="loadNavBar()">
    <div class="menu" id="navBar"></div>        
		<div class="divCont">
            <form class="inserta" id="insertaUsuario" name="insertaUsuario">
                <p>Matricula <input type="text" name="matricula" id="matricula"></p>
				<p>Nombre de Asesor <input type="text" name="nombre" id="nombre"></p>
				<p>Apellido Paterno <input type="text" name="paterno" id="paterno"></p>
                <p>Apellido Materno <input type="text" name="materno" id="materno"></p>
                <p>Telefono <input type="text" placeholder="Ej. 5555555555" name="telefono" id="telefono"></p>
                <p>E-mail <input type="text" placeholder="example@mail.com" name="email" id="email"></p>
                <p>Carrera <input type="text" name="carrera" id="carrera"></p>
                <p>Division <input type="text" name="division" id="division" placeholder="Ej. CBI"></p>
            </form>
            <button id="enviar" name="enviar" onclick="addUsuario()">Enviar</button>
        </div>
        
	</body>
</html>