<?php
    // LISTAVENTA --> MODIFICARSTOCK (GET) enviar informacion del formulario, la consulta de todo el dato(idventa)
    // MODIFICARVENTA(POST) --> Stock_ABM.php --> header: LISTASTOCK (POST) Actualizacion

    if (isset($_GET["id"])) { // Es el id enviado de la listaventa(GET)
        $id = $_GET["id"];  //  idventa

        //Establecemos la conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);
        
        //Consulta del idstock que recibimos de GET
        $consulta = "SELECT * FROM venta WHERE idventa = ".$id;
    
        $resultado = mysqli_query($conectar,$consulta);// Ejecucion de la consulta y la conexion

        $registro = mysqli_fetch_array($resultado); //  El resultado lo pondremos en un array ya que son muchas filas de frutas
    
        /*if (isset($_POST["actualizar"])) {
            # code...
        }*/

        $consulta2 = "SELECT * FROM stock"; #SELECT fruta FROM venta WHERE fruta NOT IN(SELECT fruta FROM venta WHERE idventa = '".$id."')
    
        $resultado2 = mysqli_query($conectar,$consulta2);// Ejecucion de la consulta y la conexion
        $registro2 = mysqli_fetch_array($resultado2);
    }
?>

<?php
    include('./template/cabecera.php')
?>

<div class="card mb-3">
        <h3 class="card-header">Modificar Venta</h3>
    </div>

    <div class="container">
        <form method="post" action="venta_ABM.php">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Id de la venta</label>
                    <!-- En este campo de id pusimos readonly osea que solo podemos leer el dato y extraerlo pero no modificarlo xq es el id autoincrementable-->
                    <input type="text" class="form-control" name="idventa" aria-describedby="idventa" value="<?php echo $registro['idventa'] ?>" readonly >
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Nombre del cliente</label>
                    <input type="text" class="form-control" name="nombrecliente" aria-describedby="nombrecliente" value="<?php echo $registro['nombre_cliente'] ?>">
                </div>
                
                <div class="form-group">
                    <label class="form-label mt-4">Seleccione la fruta</label>
                    <select class="form-select" name ="nombre_f" id="nombre_f">
                        
                        <?php
                            foreach($resultado2 as $res2){ 
                                echo "<option>".$res2['nombre']."</option>"; #  Arreglar! 1. relacionar idstock->idventa(BD) 2. Usar selected       
                            }
                        ?>
                        <!--
                        <option>Sandia</option>
                        <option>Manzana</option>
                        -->
                    </select>
                <!-- 
                <div class="form-group">
                    <label class="form-label mt-4">Nombre de la fruta</label>
                    <input type="text" class="form-control" name="nombrefruta" aria-describedby="fruta" value="<?php echo $registro['fruta'] ?>">
                </div>
                -->
                <div class="form-group">
                    <label class="form-label mt-4">Cantidad a vender</label>
                    <input type="text" class="form-control" name="cantidad_v" aria-describedby="cantidadvender" value="<?php echo $registro['cantidad_v'] ?>">
                </div>                
                <div class="form-group">
                    <label class="form-label mt-4">Precio (Bs)</label>
                    <input type="text" class="form-control" name="precio" aria-describedby="precioventa" value="<?php echo $registro['precio'] ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="modificar">Modificar venta</button>
            </fieldset>
        </form>
    </div>
</body>
</html>