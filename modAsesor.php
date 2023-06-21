<?php
include 'conect.php';

    if($conn!=FALSE)
    {
        $str_json = file_get_contents('php://input');
        $response = json_decode($str_json, true);
        $aux=$response['nombreAsesor'];
        $matricula=$response['matricula'];
        $nombre=$response['nombre'];
        $paterno=$response['paterno'];
        $materno=$response['materno'];
        $telefono=$response['telefono'];
        $email=$response['email'];
        $carrera=$response['carrera'];
        $division=$response['division'];
        $queryAsesor="UPDATE asesor set matriculaAsesor='".$matricula."',nombreAsesor='".$nombre."',paternoAsesor='".$paterno."',maternoAsesor='".$materno."',telefonoAsesor='".$telefono."',correoAsesor='".$email."',carrera='".$carrera."',division='".$division."' where matriculaAsesor='".$aux."'";
        //$result = mysqli_query($db,$query);
        if(mysqli_query($conn,$queryAsesor))
        {    
            header('Location:consultaHistorial.php');
        }
        else
        {
            header('Location:modificaAsesor.php');
        }
    }
    else
    {
        header('Location:modificaAsesor.php');
    }
?>