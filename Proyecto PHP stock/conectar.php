

<?php
    // Establecemos la conexion a la BD
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $BD = "frutas";

    $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

    // Comprobamos  si hay Conexion con la BD
    if(!$conectar){
        // Nos mostrara el Error y terminara la condicional
        die("No hay conexion".mysqli_connect_errno());
    }else{
        echo "Conexion exitosa!!!";
    }
    
?>