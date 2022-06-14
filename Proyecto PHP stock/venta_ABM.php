<?php

    //Adicionar
    if (isset($_POST["registrar"])) {
        $nombre_f = $_POST["nombre_f"];
        $cantidad_v = $_POST["cantidadV"];
        $nombreC = $_POST["nombreC"];
        $precio = $_POST["precio"];

        $servidor = "127.0.0.1";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

        $insertar = "INSERT INTO venta (idventa, nombre_cliente, fruta, cantidad_v, precio) VALUES ('', '".$nombreC."', '".$nombre_f."', '".$cantidad_v."', '".$precio."' )";
    
        $resultado = mysqli_query($conectar, $insertar);
    
        if (!$conectar) {
            die("No hay conexion".mysqli_connect_errno());
        } else {
            #echo "Conexion Satisfactoria!!";
            header("location: listarventa.php");
        }
        mysqli_close($conectar);
        
    }
?>