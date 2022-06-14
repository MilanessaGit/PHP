<?php
    // LISTASTOCK --> MODIFICARSTOCK (GET) enviar informacion del formulario
    // MODIFICARSTOCK(POST) --> Stock_ABM.php --> header: LISTASTOCK (POST) Actualizacion

        //Establecemos la conexion a la BD
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $BD = "frutas";
        $conectar = mysqli_connect($servidor, $usuario, $password, $BD);
        
        //Consulta del idstock que recibimos de GET
        $consulta = "SELECT nombre FROM stock";
    
        $resultado = mysqli_query($conectar,$consulta);// Ejecucion de la consulta y la conexion

        #$registro = mysqli_fetch_array($resultado); //  El resultado lo pondremos en un array ya que son muchas filas de frutas

?>

<!-- navbar -->
<?php
    include('./template/cabecera.php');
?>

<div class="card mb-3">
        <h3 class="card-header">Inicio (Registrar Venta)</h3>
    </div>
    <div class="container">
        <form method="post" action="venta_ABM.php">
            <fieldset>                
                <div class="form-group">
                    <label class="form-label mt-4">Seleccione la fruta</label>
                    <select class="form-select" name = "nombre_f" id="nombre_f">
                        
                        <?php
                            foreach($resultado as $res){ 
                                echo "<option>".$res["nombre"]."</option>";
                            }
                        ?>
                        <!--
                        <option>Sandia</option>
                        <option>Manzana</option>
                        -->
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Cantidad a vender</label>
                    <input type="text" class="form-control" name="cantidadV" id="cantidadV" aria-describedby="cantidadvendida" placeholder="Introduzca un numero...">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Nombre cliente</label>
                    <input type="text" class="form-control" name="nombreC" id="nombreC" aria-describedby="nombrecliente" placeholder="Introduzca el nombre del cliente...">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Precio a pagar</label>
                    <input type="text" class="form-control" name="precio" id="precio" aria-describedby="precioapagar" placeholder="Introduzca el precio a pagar...">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="registrar">Registrar venta</button>
            </fieldset>
        </form>
    </div>

</body>
</html>