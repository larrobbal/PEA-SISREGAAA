<?php
$v1="localhost";
$v2="root";
$v3="pass123";
$v4="RegistroHorasAsesores";
$conn = mysqli_connect($v1,$v2,$v3,$v4);
if($conn->connect_error)
{
    die("Conection failed: ".$conn->connect_error);
}
?>