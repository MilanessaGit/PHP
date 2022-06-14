
<?php
include('./template/cabecera.php')
?>
<?php
  //EStablecemos conexion a la BD
  $servidor = "localhost"; // 127.0.0.1
  $usuario = "root";
  $password = "";
  $BD = "frutas";
  $conectar = mysqli_connect($servidor, $usuario, $password, $BD);

  $consultaL = "SELECT * FROM venta";
  $resultado = mysqli_query($conectar, $consultaL);
?>

<div class="card mb-3">
          <h3 class="card-header">Listar Ventas</h3>
  </div>
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">Nro</th>
        <th scope="col">Nombre cliente</th>
        <th scope="col">Nombre fruta</th>
        <th scope="col">Cantidad vendida</th>
        <th scope="col">Precio a pagar</th>
        <th scope="col">Opciones</th>

      </tr>
    </thead>
    <tbody>
      
      <?php
        foreach ($resultado as $res) {
          echo "<tr>";
            echo "<th scope='row'>".$res["idventa"]."</th>";
            echo "<td>".$res["nombre_cliente"]."</td>";
            echo "<td>".$res["fruta"]."</td>";
            echo "<td>".$res["cantidad_v"]."</td>";
            echo "<td>".$res["precio"]."</td>";
            //php?var=".$res." aqui le pasamos un parametro en este caso el idventa a una var(baja) por el metodo GET
            echo "<td><a href='venta_ABM.php?baja=".$res["idventa"]."'>Eliminar</a>";  // Aqui usaremos el metodo GET xq solo necesitamos idventa como puntero para despues hacer la consulta solicitada
            // El dato php?id sera recibido en modificarventa.php con el metodo GET
            echo "    <a href='modificarventa.php?id=".$res["idventa"]."'>Modificar</a></td>";
        echo "</tr>";
        }
      ?>
    
      <!--
      <tr>
        <th scope="row">1</th>
        <td>Sandra Lopez</td>
        <td>Sandia</td>
        <td>1</td>
        <td>35</td>
      </tr>
      
      <tr class="table-light">
        <th scope="row">2</th>
        <td>Martha Choque</td>
        <td>Manzana</td>
        <td>25</td>
        <td>50</td>
      </tr>
      -->
    </tbody>
  </table>

</body>
</html>