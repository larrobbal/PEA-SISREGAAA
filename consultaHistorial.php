<?php
include 'conect.php';
if($conn!=FALSE)
{
    $str_json = file_get_contents('php://input');
    $response = json_decode($str_json, true);
    $var = $response['matriculaAsesor'];
    $query = "SELECT fechaInicio,fechaFin,horasAsesoria FROM periodo,asesoria WHERE (SELECT idAsesor FROM asesor WHERE matriculaAsesor = '".$var."')=asesoria.idAsesor AND periodo.idPeriodo = asesoria.idPeriodo";
    $result = mysqli_query($conn,$query);
    $arreglo = array();
    $json = array();

    while($data=mysqli_fetch_assoc($result))
    {
        $arreglo[]=$data;
    }
    $json=json_encode($arreglo);

    echo $json;
}
else
{
    header('Location:consultaHistorial.php');
}
?>