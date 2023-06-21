<?php
include 'conect.php';

    if($conn!=FALSE)
    {
        $str_json = file_get_contents('php://input');
        $response = json_decode($str_json, true);
        $matricula=$response['matricula'];
        $queryAsesoria ="DELETE FROM asesoria WHERE idAsesor = (SELECT idAsesor FROM asesor where matriculaAsesor = '".$matricula."')";
        $queryAsesor="DELETE from asesor WHERE matriculaAsesor='".$matricula."'";
        //$result = mysqli_query($db,$query);
        if(mysqli_query($conn,$queryAsesoria)&&mysqli_query($conn,$queryAsesor))
        {    
            header('Location:eliminaAsesor.php');
        }
        else
        {
            header('Location:eliminaAsesor.php');
        }
    }
    else
    {
        header('Location:eliminaAsesor.php');
    }
?>