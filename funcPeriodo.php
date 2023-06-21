<?php
include 'conect.php';
$queryP = "SELECT idPeriodo,fechaInicio,fechaFin FROM periodo";
$resultP = mysqli_query($conn,$queryP);
$arreglo = array();
$json = array();

while($data=mysqli_fetch_assoc($resultP))
{
    $arreglo[]=$data;
}
$json=json_encode($arreglo);

echo $json;
?>