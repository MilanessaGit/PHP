
<?php
include('./template/cabecera.php')
?>

<?php
  // Establecemos la conexion
  $servidor = "localhost";
  $usuario = "root";
  $password = "";
  $BD = "frutas";

  $conectar = mysqli_connect($servidor, $usuario, $password, $BD); // Realizamos la conexion

  $consulta = "SELECT * FROM stock"; // Hacemos la consulta a la tabla stock

  $resultado = mysqli_query($conectar, $consulta);  // En esta variable ejecutamos el Query(Consulta)

  
?>

<div class="card mb-3">
          <h3 class="card-header">Listar Stock</h3>
  </div>
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">Nro</th>
        <th scope="col">Nombre fruta</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio unitario (Bs)</th>
        <th scope="col">Opciones</th>
        
      </tr>
    </thead>
    <tbody>

    <?php
      //th columna encabezado
      //td fila
      foreach ( $resultado as $res ){
        echo "<tr>";
            echo "<th scope='row'>".$res["idstock"]."</th>";
            echo "<td>".$res["nombre"]."</td>";
            echo "<td>".$res["cantidad"]."</td>";
            echo "<td>".$res["preciounitario"]."</td>";
            //php?var=".$res." aqui le pasamos un parametro en este caso el idstock a una var(baja) por el metodo GET
            echo "<td><a href='stock_ABM.php?baja=".$res["idstock"]."'>Eliminar</a>";  // Aqui usaremos el metodo GET xq solo necesitamos idstock como puntero para despues hacer la consulta solicitada
            // El dato php?id sera recibido en modificarstock.php con el metodo GET
            echo " <a href='modificarstock.php?id=".$res["idstock"]."'>Modificar</a></td>";
        echo "</tr>";
      }

    ?>

    </tbody>
  </table>

</body>
</html>