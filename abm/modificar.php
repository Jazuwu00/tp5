<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tiendaderopa");

// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ropa WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$respuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($respuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="shortcut icon" href="./imagenes/icono.png" type="image/x-icon">
  <title>Tienda</title>
 
    
    </head>
    <body class="text-light text-center" style=" background-color: rgb(43, 46, 51);">

        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $ropa=$datos["ropa"];
        $marca=$datos["marca"];
        $talle=$datos["talle"];
        $precio=$datos["precio"];
        $imagen=$datos['imagen'];?>
<div class=" bg-dark text-light text-center  pt-3 pb-3" >
    <h1>Tienda de ropa</h1>
    <button class="btn btn-primary " type="submit"><a  class="text-light text-decoration-none" href="../index.php">Inicio</a></button>
  <button class="btn btn-primary" type="submit"><a  class="text-light text-decoration-none"href="../listar.php">Listar ropa</a></button>
  <button class="btn btn-primary" type="submit"><a class="text-light text-decoration-none" href="../abm/agregar.html">Agregar ropa</a></button>
</div>
<br>
<div class="mt-3 text-center">
    <h2>Ingrese los datos  para modificar la prenda </h2>
    <br>
   
</div>


        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos de la prenda.</p>


<br>
<form action="" method="post" enctype="multipart/form-data" class="container-md" style="width:500px; font-size:20px;">
    <div class="col"><div class="mb-3">

    <label class="form-label">Tipo de prenda</label>
    <input type="text" name="ropa"  class="form-control" placeholder="Tipo de Prenda" value="<?php echo "$ropa"; ?>"> 
      
    </div></div>


    <div class="col">
    <div class="mb-3">
      <label class="form-label">Marca</label>
      <input type="text" name="marca"  class="form-control" placeholder="Marca" value="<?php echo "$marca"; ?>" >
    </div></div>
     
      <div class="col">
      <div class="mb-3">
      <label class="form-label">Talle</label>
      <input type="text" class="form-control" placeholder="talle" name="talle" value="<?php echo "$talle"; ?>">
      
    </div></div>

    <div class="col"><div class="mb-3">
      <label  class="form-label">Precio</label>
      <input type="text" name="precio"  class="form-control" placeholder="$100" value="<?php echo "$precio"; ?>">
    </div></div>

    <div class="col ">
    <label for="">Elije una imagen</label> <br>
    <br>
    <input type="file" name="imagen" placeholder="imagen" required>
    </div>

    <div class="col "><button type="submit"  name="guardar_cambios" value="Guardar Cambios" class="btn btn-primary mt-4">Guardar Cambios</button>
    
            <button class="btn btn-danger mt-4" type="submit" name="Cancelar" formaction="../index.php">Cancelar</button></div>
    </form>
    <br>
    
    <?php
        //dentro del value ponemos el dato que que trajimos del egistro para que ya aparezca el el imput y no volver aq escribirlo
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){

            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $ropa=$_POST['ropa'];
                    $marca=$_POST['marca'];
                    $talle=$_POST['talle'];
                    $precio=$_POST['precio'];
                    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE ropa SET ropa='$ropa', marca='$marca', talle='$talle', precio='$precio', imagen='$imagen' WHERE id =$id";

             // 4') Ejecutar la orden y actualizamos los datos
             // a) ejecutar la consulta
             mysqli_query($conexion,$consulta);

            // a) rederigir a index
            header("Location: ..\index.php");

        }?>
   
    <footer class=" footer bg-dark text-center text-lg-start mt-4">
  <!-- Copyright -->
  <div class="text-center p-3 text-light">
    © 2020 Copyright:
  </div>
</footer>

        
        
    </body>
</html>
