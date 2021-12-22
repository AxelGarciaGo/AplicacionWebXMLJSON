<!-- Inicio del código php -->
<?php
// Condición que indica si se selecciona el boton de registrar
 if (isset($_POST['agregar'])){
        require ("cn.php");
    // Comando de consulta para insercción en tipo sql
    $sql="INSERT INTO domicilio(calle, num_casa, colonia) VALUES 
    ('$_REQUEST[calle]','$_REQUEST[numCasa]','$_REQUEST[colonia]')";
    // Validación de consulta
    $consulta=mysqli_query($conexion,$sql);
    // Condición para revisar si se hizo o no la consulta
    if($consulta){
      // Alerta que se envía si se puede hacer la consulta
    echo '<script >alert("Domicilio Registrado");</script>';
  }else{
    // Alerta que se envía en caso de no poder generar la consulta
  echo '<script >alert("Registro Fallido");</script>';
}
// Cierre de la conexión
  mysqli_close($conexion);
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
        <script src="../JS/validar.js?ts=<?=time()?>"></script>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="registro">
                <!-- etiquetas y campos de texto  -->
                <label >Calle</label><br>
                <input type="text" name="calle" class="input" pattern="[a-zA-Z]{6}"><br><br><br>
                <label>Numero de casa</label><br>
                <input type="text" name="numCasa" class="input"><br><br><br>
                <label>Colonia</label><br>
                <input type="text" name="colonia" class="input"><br><br><br>
                <!-- Botones de la página -->
                <input type="submit" value="Registrar" class="button" name="agregar"> 
                <input type="reset" value="Limpiar" class="button" >
            </form>
        </div>
    </body>
</html>