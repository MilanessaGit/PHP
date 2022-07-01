<?php
    // En esta clase iran todos los metodos Para Agregar(Adicionar), Eliminar(Baja) y Modificar(M) ABM

    //Adiccionar
    if (isset($_POST["insertar"])) {    // isset agarra todo lo del POST
        // Obtenemos los valores del formulario de registrar.php
        $nombre = $_POST["nombrefruta"];
        $cantidad = $_POST["cantidad"];
        $preciounitario = $_POST["precio"];
        
        // Conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);
    
        // Consulta BD
        $insertar = "INSERT INTO stock (idstock, nombre, cantidad, preciounitario) VALUES ('', '".$nombre."', '".$cantidad."', '".$preciounitario."' )";

        // Hacemos correr la conexion y consulta(Query)
        $resultado = mysqli_query($conectar, $insertar);  
        
        //Revisamos la conexion 
        if(!$conectar){
            // Nos mostrara el error
            die("No hay conexion".mysqli_connect_errno());
        }else{
            // Si hay conexion nos dirigira al Listado
            //echo "Conexion exitosa!!!";
            header("location: listarstock.php");
        }
        mysqli_close($conectar); // Cerramos la conexion
    }

    // Eliminar(Baja)
    if (isset($_GET["baja"])) { // Usamos el metodo GET
        $nro_id = $_GET["baja"]; // idstock

        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

        $eliminar = "DELETE FROM stock WHERE idstock =".$nro_id;    //  Para la consulta solo necesitaremos el idstock como puntero(Met.GET) a la fruta que deseemos eliminar
        $resultado = mysqli_query($conectar,$eliminar);

        if($resultado){
           //echo "Conexion exitosa!!!";
            header("location: listarstock.php");
        }
        mysqli_close($conectar);
    }

    //  Modificar(M)
    if (isset($_POST["modificar"])) {
        // Ponemos las variables del formulario de modificar.php (POST)
        $idfruta = $_POST["id"];
        $nombrefruta = $_POST["nombrefruta"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];

        //  Variables para la conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);//  Conexion a la BD

        //  Creamos la consulta para modificar, en este caso en el formulario solo se puede leer el campo id es el unico dato q no se puede modificar solo apuntar
        $modificar = "UPDATE stock SET idstock = '".$idfruta."', nombre = '".$nombrefruta."' , cantidad = '".$cantidad."' , preciounitario = '".$precio."' WHERE idstock =".$idfruta;
        
        $resultado = mysqli_query($conectar, $modificar); //    Ejecutamos el Query(consulta de modificar)
        
        //Revisamos la conexion 
        if(!$conectar){
            // Nos mostrara el error
            die("No hay conexion".mysqli_connect_errno());
        }else{
            // Si hay conexion nos dirigira al Listado
            //echo "Conexion exitosa!!!";
            header("location: listarstock.php");
        }
        mysqli_close();

    }

?>