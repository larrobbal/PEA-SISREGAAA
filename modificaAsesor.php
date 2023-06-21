<!DOCTYPE HTML>
<html>
    <script src="js/values.js" type="text/javascript"></script>
	<head>
		<title>Modifica Asesor - SISREGAA</title>
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
                <p>Matricula <input type="text" name="matricula" id="matricula"></p>
				<p>Nombre de Asesor <input type="text" name="nombre" id="nombre"></p>
				<p>Apellido Paterno <input type="text" name="paterno" id="paterno"></p>
                <p>Apellido Materno <input type="text" name="materno" id="materno"></p>
                <p>Telefono <input type="text" name="telefono" id="telefono"></p>
                <p>E-mail <input type="text" name="email" id="email"></p>
                <p>Carrera <input type="text" name="carrera" id="carrera"></p>
                <p>Division <input type="text" name="division" id="division"></p>
            </form>
            <button id="enviar" name="enviar" onclick="modifUsuario();">Enviar</button>
            <fieldset>
            <legend>Eliminar Asesor</legend>
                <p style="color:red">ADVERTENCIA: Eliminar a un asesor provocará que se elimine también el registro de sus asesorías</p>
                <p><button id="elimina" name="elimina" onclick="deleteUsuario()">Eliminar</button></p>
            </fieldset>
        </div>
        
	</body>
</html>