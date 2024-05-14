<?php
include_once('nombre.php');

$user=$_SESSION['email'];

$sql="select * from administrador where correo_Electronico='".$user."'";

$ejecucion_sql=$conexion->query($sql);

    if($fila=$ejecucion_sql->fetch_assoc())
    {
        // me guarda el registro en el objeto fila

    }

    $entrar="";

// Aqui entra despues de presionar el boton de submit
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //Actualizar un registro
   include_once('conexion.php');

   // Actualizar los datos
    $nombre=$_POST['nombre'];
    $paterno=$_POST['paterno'];
    $materno=$_POST['materno'];
     $email=$_POST['email'];
     $tipo_us=$_POST['tipo'];
     
   
       $sql="update administrador set correo_Electronico='$email', tipo_Usuario='$tipo_us', where correo_Electronico='$user'"; 
       
       $ejecutar_sql=$conexion->query($sql);
   
       // mensaje
   
       if ($ejecutar_sql)
      {
       $entrar="actu";
      }
      else
      {
        $entrar="noactu";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsivo.css">
    <link rel="icon" href="../img/2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/editar-us.css">
    <link rel="stylesheet" href="../../usuario/css/fontello.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
</head>
<body>

 <!-- Header -->
 <header class="header-style ">
        <input type="checkbox" id="btn-menu">

        <label for="btn-menu"><img src="../../usuario/img/menu-despegar.png" alt="menu" >
        </label>

            <div class="header-logo"><a href="principal-admin.php" class="header-logo-menu"><img src="../img/2.png" alt=""></a></div>
            <nav class="navegacion">
                <ul class="menu">
                    <li>
                        <a href="principal-admin.php">INICIO</a>
                    </li>  
                    
                    <li>
                        <a href="#">Gestionar</a>
                        <ul class="submenu">
                            <li><a href="inventario.php">Productos</a></li>
                            <li><a href="proveedor.php">Proveedores</a></li>
                            <li><a href="Ordenes.php">Orden de Entrega</a></li>
                            <li><a href="tickets.php">Tickets</a></li>
                            <li><a href="clientes.php">Clientes</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="admin"><?php echo $nombre . ' ' . $paterno . ' ' . $materno;?></a>
                        <ul class="submenu">
                            <li><a href="datos-cuenta.php">Datos de la cuenta</a></li>
                            <?php
                        if ($privilegio=="Administrador")
                        echo "<li><a href='admin-cuenta.php'>Administrar cuentas</a></li>"
                        ?>
                            <li><a href="login.php">Cerrar sesion</a></li>
                        </ul>
                    </li>
                </ul>
                <ion-icon name="header-icon"></ion-icon>
            </nav>
        </header>

        <section class="ordenes1">
        <!-- Regresar -->
     <div class="ordenes-ingresar">
            <div class="ordenes-ingresar-contenido">
                <a href="eliminar-cuenta.php"><i class="icon-angle-circled-left"></i></a>
                <p>Regresar</p>
            </div>  
        </div>
    </section>

       <!-- Seccion con formulario -->

       <section class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 seccion1">
       <h1>Editar usuario</h1>
        <article align="center" class="col-xl-4 col-lg-2 col-md-2 col-sm-2 col-12 article1">
            <div></div>
            <br>
        </article>

            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" 
            enctype="multipart/form-data" class="col-xl-8 col-lg-10 col-md-10 col-sm-10 col-12">
                <br><br>
                <table>
                <tr>
                <td><label for="nombre">Nombre(s):</label></td>
                <td><input type="text" pattern="[a-z  A-Z]{1,40}" name="nombre" required maxlength="40"></td>
                </tr>
                <tr>
                <td><br><label for="paterno">Apellido Paterno:</label></td>
                <td><br><input type="text" pattern="[a-z  A-Z]{1,20}" name="paterno" required maxlength="20"></td>
                </tr>
                <tr>
                <td><br><label for="materno">Apellido Materno:</label></td>
                <td><br><input type="text" pattern="[a-z  A-Z]{1,20}" name="materno" required maxlength="20"></td>
                </tr>
                <tr>
                <td><br><label for="edad">Edad:</label></td>
                <td><br><input type="text" pattern="[0-9]{1,2}" maxlength="3" name="edad" required ></td>
                </tr>
                <tr>
                <td><br><label for="telefono">Telefono:</label></td>
                <td><br><input type="text" pattern="[0-9]{1,10}" name="telefono" required maxlength="10"></td>
                </tr>
                <tr>
                <td><br><label for="direccion">Direccion:</label></td>
                <td><br><input type="text" maxlenght="60" name="direccion" required ></td>
                </tr>
                <tr>
                <td><br><label for="email">Correo Electronico:</label></td>
                <td><br><input type="email" maxlength="60" name="email" required ></td>
                </tr>
                <tr>
                <td><label for="tipo_usuario">Tipo de Usuario:</label></td>
                <td>
                    <select name="tipo_usuario" id="">
                        <option value="Empleado">Empleado</option>
                        <option value="Administrador" selected>Administrador</option>
                    </select>
                </td>
                </tr>
                <tr align="center">
                <td><br><br><input type="submit" name="enviar" value="Enviar" ></td>
                <td><br><br><input type="reset" name="limpiar" value="Cancelar" ></td>
                </tr>
                </table>
        </form>
    </section>

  


</body>
</html>

<?php
include_once("alertas.php");
?>