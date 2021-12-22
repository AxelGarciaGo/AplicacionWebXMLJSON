<!-- inicio de php -->
<?php
// verificación en caso de que se elija la opción de eliminar
 if (isset($_POST['eliminar'])){
    require ("cn.php");
    // Comando de colsuta sql
    // Busca el empleado con el id que se ingreso
    $sql="SELECT * FROM habitantes WHERE num_habitante='$_REQUEST[numHabitante]'";
    // Se realiza la consulta
    $consulta=mysqli_query($conexion,$sql); 
    if ($consulta) {
      // Se convierte la consulta en una fila para conocer lo que retorno
      $valor= mysqli_fetch_row($consulta);
      // se compara el resultado retornado
      // en caso de ser 0 no retorno ningún valor
      // en caso de ser myor a 0 retorno un valor
      if ($valor>0){
        // Comando de sql para la eliminación del empleado según el rfc ingresado
        $sql="DELETE FROM habitantes WHERE num_habitante='$_REQUEST[numHabitante]'";
        // Se ejecuta el comando
        $consulta=mysqli_query($conexion,$sql);
        // Alerta en caso de ser eliminado correctamente
        echo '<script> alert("Habitante eliminado");</script>';
      }else{
        // alerta en caso de que el rfc no exista
        echo '<script> alert("ERROR: El habitante no existe");</script>';
      }
    }else{
      // alerta en caso de que este mal la conexión o el comando
      echo '<script> alert("ERROR: No se puede conectar en este momento");</script>';
    }
    // cierre de la conexión
    mysqli_close($conexion);
  }
?>
<!-- fin de php -->
<!-- inicio de php -->
<?php
// Inicio de sentencia if en caso de elegir la opción de modificar
if (isset($_POST['modificar'])) {
    require ("cn.php");
    // Comando sql para la busqueda del empleado con el rfc ingresado
    $sql="SELECT * FROM habitantes WHERE num_habitante='$_REQUEST[numHabitante]'";
    // Se ejecuta el comando
    $consulta=mysqli_query($conexion,$sql); 
    // Verificación de que la consulta se haya echo
    if ($consulta) {
      // Conversión de la consulta en una fila para conocer el valor
      $valor= mysqli_fetch_row($consulta);
      // se compara el resultado retornado
      // en caso de ser 0 no retorno ningún valor
      // en caso de ser myor a 0 retorno un valor
      if ($valor>0){
        // En caso de recibir datos se guarda el rfc del empleado
        $id=$_REQUEST['numHabitante'];
        // Se genera un camando para guardar el rfc en una tabla de apoyo
        $sql="INSERT INTO ayuda (ayuda) VALUES ('$id')";
        // Se ejecuta el comando
        $consulta=mysqli_query($conexion,$sql);
        // Se direcciona a una nueva página para las modificaciones 
        // Se pasa el valor del id
        header ("Location: modificarHabitante.php?var_pin=".($id));
      }else{
        // alerta en caso de que el rfc este mal o no exista
        echo '<script> alert("ERROR: El habitante no existe");</script>';
      }
    }else{
      // alerta en caso de que este mal la conexión o el comando inicial
      echo '<script> alert("ERROR: No se puede conectar en este momento");</script>';
    }
    // cierre de la conexión
    mysqli_close($conexion);
}
?>
<!-- fin php -->
<!DOCTYPE html>

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
        <title>Habitantes</title>
    </head>
    <body>
        <script src="../JS/validar.js"></script>
        <!-- Inicio del listado del menú inicial -->
        <ul>
        <!-- Opción de lista -->
        <img class="imgNav" src="../Images and icons/municipio.png">
        <li><a  href="Menu.html">Home</a></li>
        
        <!--  Opción del listado con menú desplegable referente a los habitantes -->
        </li>
        <li class="dropdown">
        <a href="javascript:void(0)" class="active">Habitantes</a>
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
        <a href="javascript:void(0)" class="dropbtn">Domicilio</a>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="registro">
                <!-- etiquetas y campos de texto  -->
                <label form="name">Numero de habitante</label><br>
                <input type="text" name="numHabitante" class="input" ><br><br><br>
                
                <!-- Botones de la página -->
                <input type="submit" value="Eliminar" class="button" name="eliminar">
                <input type="submit" value="Modificar" class="button" name="modificar"> 
                 <input type="reset" value="Limpiar" class="button">
            </form>
        </div>
    </body>
    
</html>