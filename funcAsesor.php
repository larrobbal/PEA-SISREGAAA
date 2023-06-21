<?php
include 'conect.php';

    if($conn!=FALSE)
    {
        $str_json = file_get_contents('php://input');
        $response = json_decode($str_json, true);
        $matricula=$response['matricula'];
        $nombre=$response['nombre'];
        $paterno=$response['paterno'];
        $materno=$response['materno'];
        $telefono=$response['telefono'];
        $email=$response['email'];
        $carrera=$response['carrera'];
        $division=$response['division'];
        $queryAsesor="INSERT INTO asesor (matriculaAsesor,nombreAsesor,paternoAsesor,maternoAsesor,telefonoAsesor,correoAsesor,carrera,division) values ('".$matricula."','".$nombre."','".$paterno."','".$materno."','".$telefono."','".$email."','".$carrera."','".$division."')";
        //$result = mysqli_query($db,$query);
        if(mysqli_query($conn,$queryAsesor))
        {    
            header('Location:horas.php');
        }
        else
        {
            header('Location:addUsuario.php');
        }
    }
    else
    {
        header('Location:addUsuario.php');
    }
?>