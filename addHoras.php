<?php
    include 'conect.php';
    if($conn!=FALSE)
    {
        $str_json = file_get_contents('php://input');
        $response = json_decode($str_json, true);
        $matricula = $response['nombreAsesor'];
        $periodo = (int)$response['periodo'];
        $horas = (int)$response['horas'];
        $queryPeriodo="INSERT INTO asesoria (horasAsesoria,idAsesor,idPeriodo) values (".$horas.",(SELECT idAsesor from asesor where matriculaAsesor='".$matricula."'),".$periodo.")";
        if(mysqli_query($conn,$queryPeriodo))
        {    
            header('Location:horas.php');
        }
        else
        {
            header('Location:horas.php');
        }
    }
    else
    {
        header('Location:horas.php');
    }
?>