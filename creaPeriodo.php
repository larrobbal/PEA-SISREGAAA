<?php
    include 'conect.php';
    if($conn!=FALSE)
    {
        $str_json = file_get_contents('php://input');
        $response = json_decode($str_json, true);
        $fechaInicio = $response["inicio"];
        $fechaFin = $response["fin"];
        
        $queryPeriodo="INSERT INTO periodo (fechaInicio,fechaFin) values ('".$fechaInicio."','".$fechaFin."')";
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