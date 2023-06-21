<?php
include 'conect.php';
$queryA = "SELECT matriculaAsesor,nombreAsesor,paternoAsesor FROM asesor";
$resultA = mysqli_query($conn,$queryA);
$arregloA = array();
$jsonA = array();

while($data=mysqli_fetch_assoc($resultA))
{
    $arregloA[]=$data;
}
$jsonA=json_encode($arregloA);

echo $jsonA;
?>