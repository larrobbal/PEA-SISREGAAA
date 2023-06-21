<?php
$usuario = $_POST['user'];
$pass = $_POST['pass'];
if(empty($usuario) || empty($pass))
{
    header("Location: login.html");
    exit();
}

include 'conect.php';
$query = "SELECT * FROM usuario where nombreUsuario='" .$usuario. "' and passUsuario='" .$pass. "'";
        $result = mysqli_query($conn,$query);
        $cont = mysqli_num_rows($result);

        if($row = mysqli_fetch_assoc($result))
        { 
            if($row['passUsuario'] == $pass)
            {
                session_start();
                $_SESSION['nombreUsuario'] = $usuario;
                header("Location: indexDoc.php");
                return true;
            }
            else
            {
                header("Location: login.html");
                exit();
            }
        }
        else
        {
            header("Location: login.html");
            exit();
        }
?>