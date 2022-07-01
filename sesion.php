<?php
    /*ejemplo de Sesiones con BD
    session_start();

    $_SESSION["lasin2022"] = "autor";
    print_r($_SESSION);
    */

    if (isset($_POST["iniciar"])) {
        $usuario_bd = $_POST['usuario_email'];
        $password_bd = $_POST['contrasena_email'];

        $servidor = "127.0.0.1";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

        $consulta = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conectar, $consulta);

        $sw = 0;
        $_SESSION["lasin2022"] = "";
        foreach ($resultado as $res){
            if ($res['email'] == $usuario_bd && $res['password'] == $password_bd) {
                $sw = 1;
            }  
        }
        if ($sw == 1) {
            session_start(); 
            $_SESSION["lasin2022"] = $usuario_bd." -- ".$password_bd; 
            $_SESSION["rol"] = $usuario_bd;
            print_r($_SESSION);
            header("location: inicio.php");
        }else{
            header("location: index.php");
        }

        mysqli_close($conectar);
    }
?>