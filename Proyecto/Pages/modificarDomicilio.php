<?php
if (isset($_POST['aceptar'])){
    $id;
    $calle=$_REQUEST['calle'];
    $numCasa=$_REQUEST['numCasa'];
    $colonia=$_REQUEST['colonia'];
    require ("cn.php");
    $ayuda="SELECT * FROM ayuda";
    $resul=mysqli_query($conexion,$ayuda);
    if($resul){
        $valor=mysqli_fetch_row($resul);
        $id=$valor[0];
    }
    if($nombre!=''){
        $sql="UPDATE domicilio SET calle='$calle' WHERE id_domicilio='$id'";
        mysqli_query($conexion,$sql);
    }

    if($apellidos!=''){
        $sql="UPDATE domicilio SET num_casa='$numCasa' WHERE id_domicilio='$id'";
        mysqli_query($conexion,$sql);
    }

    if($sexo!=''){
        $sql="UPDATE domicilio SET colonia='$colonia' WHERE id_domicilio='$id'";
        mysqli_query($conexion,$sql);
    }

  $sql="DELETE FROM Ayuda";
  mysqli_query($conexion,$sql);
  mysqli_close($conexion);
  header("Location: domicilioMostrar.php");
}
?>
<?php
  if (isset($_POST['cancelar'])){
    require ("cn.php");
    $sql="DELETE FROM Ayuda";
    mysqli_query($conexion,$sql);
    header("Location: domicilioMostrar.php");
  }
?>
<!-- Fin del código php -->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        <!-- Conexión con el archivo css para el diseño -->
        <link rel="stylesheet" type="text/css" href="../CSS/estiloMenu.css?ts=<?=time()?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="../JS/validar.js"></script>
        <title>Domicilio</title>
    </head>
    <body>
        <!-- Inicio del listado del menú inicial -->
        <ul>
        <!-- Opción de lista -->
        <img class="imgNav" src="../Images and icons/municipio.png">
        <li><a  href="Menu.html">Home</a></li>
        
        <!--  Opción del listado con menú desplegable referente a los habitantes -->
        </li>
        <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Habitantes</a>
        <div class="dropdown-content">
            <!-- Contenido del menú desplegable -->
            <a href="habitantes.php" >Registrar habitante</a>
            <a href="habitantesGestionar.php" >Gestionar habitantes</a>
            <a href="habitantesConsulta.php">Consultar habitante</a>
            <a href="habitantesMostrar.php">Mostrar habitantes</a>
        </div>
        </li>
        <!--  Opción del listado con menú desplegable referente a los domicilios -->
        <li class="dropdown">
        <a href="javascript:void(0)" class="active">Domicilio</a>
        <div class="dropdown-content">
            <!-- Contenido del menú desplegable -->
            <a href="domicilio.php" >Registrar domicilio</a>
            <a href="domicilioGestionar.php" >Gestionar domicilio</a>
            <a href="domicilioConsulta.php">Consultar domicilio</a>
            <a href="domicilioMostrar.php">Mostrar domicilios</a>
        </div>
        </li>
        <!--  Opción del listado con menú desplegable referente a los usuarios -->
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Usuarios</a>
            <div class="dropdown-content">
                <!-- Contenido del menú desplegable -->
                <a href="usuarios.php" >Registrar Usuario</a>
                <a href="usuariosGestionar.php" >Gestionar Usuarios</a>
                <a href="usuariosMostrar.php">Mostrar Usuarios</a>
            </div>
        </li>
        <!-- Opción del listado referente a la salida del menú -->
        <li style="float: right;" class="dropdown"> <a href="../Login.php" >Salir</a> </li>
        </ul><br><br><br>
        <!-- Inicio de la sección que contiene las etiquetas y los campos de texto -->
        <div align="center">
            <!-- Incio de la sección que permitirá la conexión con el código php -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" >
                <!-- etiquetas y campos de texto  -->
                <label >Calle</label><br>
                <input type="text" name="calle" class="input" ><br><br><br>
                <label>Numero de casa</label><br>
                <input type="text" name="numCasa" class="input"><br><br><br>
                <label>Colonia</label><br>
                <input type="text" name="colonia" class="input"><br><br><br>
                <!-- Botones de la página -->
                <input type="submit" value="Aceptar" class="button" name="aceptar">
                <input type="submit" value="Cancelar" class="button" name="cancelar">  
			    <input type="reset" value="Limpiar" class="button">
            </form>
        </div>
    </body>
</html>