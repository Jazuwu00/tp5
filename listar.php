<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- CSS del bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./estilos/estilos.css">
  <link rel="shortcut icon" href="./imagenes/icono.png" type="image/x-icon">
  <title>Tienda</title>
</head>


<body>


<div class=" bg-dark text-light text-center  pt-3 pb-3" >
    <h1>Tienda de ropa</h1>
    <button class="btn btn-primary " type="submit"><a  class="text-light text-decoration-none" href="index.php">Inicio</a></button>
  <button class="btn btn-primary" type="submit"><a  class="text-light text-decoration-none"href="listar.php">Listar ropa</a></button>
  <button class="btn btn-primary" type="submit"><a class="text-light text-decoration-none" href="./abm/agregar.html">Agregar ropa</a></button>
</div>
<div class="mt-3 text-center">
    <h2>Lista de ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
</div>

    

<table class="table table-responsive text-center mt-5 container-md" >
  <thead>
    <tr class="text-light">
      <th scope="col-1">ID</th>
      <th scope="col-1">TIPO DE PRENDA</th>
      <th scope="col">MARCA</th>
      <th scope="col">TALLE</th>
      <th scope="col">PRECIO</th>
      <th scope="col">IMAGEN</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tiendaderopa");

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta= "SELECT * FROM ropa ";

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    // 4) Mostrar los datos del registro  
    while ( $reg = mysqli_fetch_array($datos) ) { ?>
    
    <tr class="text-light">
      <th scope="row"><?php echo $reg['ID'];?></th>
      <td><?php echo $reg['ropa'];?></td>
      <td><?php echo $reg['marca']; ?></td>
      <td><?php echo $reg['talle']; ?></td>
      <td><?php echo $reg['precio']; ?></td>
      <td><img class="" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="60px" height="40px")></td>
     
      <td> <button class="btn btn-sm bg-secondary "><a class="text-light" href="abm/modificar.php?id=<?php echo $reg['ID'];?>">Editar</a></button></td>
      <td><button class="btn btn-sm bg-danger "><a class="text-light" href="abm/borrar.php?id=<?php echo $reg['ID'];?>">Borrar</a></button></td>
     
    </tr>
    <?php } ?>
    </table>
    </tbody>
    
<footer class="footer bg-dark text-center text-lg-start mt-5 mb-0">
  <!-- Copyright -->
  <div class="text-center p-3 text-light">
    © 2020 Copyright:
  </div>
</footer>
     <!-- JavaScript del bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
