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

    
    // Eliminar(Baja)
    if (isset($_GET["baja"])) { // Usamos el metodo GET recibiendo el ?id de listarventa.php
        $nro_id = $_GET["baja"]; // idventa

        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

        $eliminar = "DELETE FROM venta WHERE idventa =".$nro_id;    //  Para la consulta solo necesitaremos el idventa como puntero(Metodo.GET) a la fruta que deseemos eliminar
        $resultado = mysqli_query($conectar,$eliminar);

        if($resultado){
           //echo "Conexion exitosa!!!";
            header("location: listarventa.php");
        }
        mysqli_close($conectar);
    }

    //  Modificar(M)
    if (isset($_POST["modificar"])) {
        // Ponemos las variables del formulario de modificar.php (POST)
        $idventa = $_POST["idventa"];
        $nombrecliente = $_POST["nombrecliente"];
        $nombrefruta = $_POST["nombre_f"];
        $cantidad_v = $_POST["cantidad_v"];
        $precio = $_POST["precio"];

        //  Variables para la conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);//  Conexion a la BD

        //  Creamos la consulta para modificar, en este caso en el formulario solo se puede leer el campo id es el unico dato q no se puede modificar solo apuntar
        $modificar = "UPDATE venta SET idventa = '".$idventa."', nombre_cliente = '".$nombrecliente."' , fruta = '".$nombrefruta."' , cantidad_v = '".$cantidad_v."' , precio = '".$precio."' WHERE idventa =".$idventa;
        
        $resultado = mysqli_query($conectar, $modificar); //    Ejecutamos el Query(consulta de modificar)
        
        //Revisamos la conexion 
        if(!$conectar){
            // Nos mostrara el error
            die("No hay conexion".mysqli_connect_errno());
        }else{
            // Si hay conexion nos dirigira al Listado
            //echo "Conexion exitosa!!!";
            header("location: listarventa.php");
        }
        mysqli_close();

    }
?>