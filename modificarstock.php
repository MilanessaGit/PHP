<?php
    // LISTASTOCK --> MODIFICARSTOCK (GET) enviar informacion del formulario
    // MODIFICARSTOCK(POST) --> Stock_ABM.php --> header: LISTASTOCK (POST) Actualizacion

    if (isset($_GET["id"])) { // Es el id enviado de la listastock(GET)
        $id = $_GET["id"];

        //Establecemos la conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);
        
        //Consulta del idstock que recibimos de GET
        $consulta = "SELECT * FROM stock WHERE idstock = ".$id;
    
        $resultado = mysqli_query($conectar,$consulta);// Ejecucion de la consulta y la conexion

        $registro = mysqli_fetch_array($resultado); //  El resultado lo pondremos en un array ya que son muchas filas de frutas
    
        /*if (isset($_POST["actualizar"])) {
            # code...
        }*/

    }
?>

<?php
    include('./template/cabecera.php')
?>

<div class="card mb-3">
        <h3 class="card-header">Modificar Stock</h3>
    </div>

    <div class="container">
        <form method="post" action="stock_ABM.php">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Id de la fruta</label>
                    <!-- En este campo de id pusimos readonly osea que solo podemos leer el dato y extraerlo pero no modificarlo xq es el id autoincrementable-->
                    <input type="text" class="form-control" name="id" aria-describedby="id" value="<?php echo $registro['idstock'] ?>" readonly >
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Nombre de la fruta</label>
                    <input type="text" class="form-control" name="nombrefruta" aria-describedby="fruta" value="<?php echo $registro['nombre'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" aria-describedby="cantidadregistrar" value="<?php echo $registro['cantidad'] ?>">
                </div>                
                <div class="form-group">
                    <label class="form-label mt-4">Precio unitario (Bs)</label>
                    <input type="text" class="form-control" name="precio" aria-describedby="preciounitario" value="<?php echo $registro['preciounitario'] ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="modificar">Modificar registro</button>
            </fieldset>
        </form>
    </div>
</body>
</html>