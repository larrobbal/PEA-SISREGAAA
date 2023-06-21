<?php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header('Location: login.html');
    exit();
}
?>
<div class="menu">
    <ul>
        <li><a href="indexDoc.php">Inicio</a></li>
        <li><a href="consulta.php">Consulta Avance</a></li>
        <li><a href="horas.php">Añadir Horas</a></li>
        <li><a href="addUSuario.php">Añadir Asesor</a></li>
        <li><a href="modificaAsesor.php">Modifica Usuario</a></li>
        <li style="float:right"><a href="cerrarSesion.php">Cerrar Sesion</a></li>
        <li style="float:right" class="usr">Bienvenido <?php echo $_SESSION['nombreUsuario']?></li>                  
    </ul>
</div>