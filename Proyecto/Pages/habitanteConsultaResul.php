<!-- Inicio del código php -->
<?php
    require ("cn.php");
    $num=$_GET['var_pin'];
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
            <!-- Inicio de tabla donde se muestran los registros -->
            <table>
                <!-- Inicio del encabezado -->
                <thead>
                    <!-- Inicio de la fila del encabezado -->
                    <tr>
                        <!-- Espacios de cada columna en la fila -->
                        <th>Numero de habitante</th>
                        <th>Numero de toma</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Id Domicilio</th>
                        <th>Correo</th>
                    </tr>
                    <!-- fin de la fila -->
                </thead>
                <!-- fin del encabezado -->
                <!-- Inicio del código php para la muestra -->
                <?php
                    // Comando de colsuta en sql para tomar todos los 
                    // valores de una tabla
                    $sql="SELECT * FROM habitantes WHERE num_habitante='$num'";
                    // Realización de la consulta
                    $consulta=mysqli_query($conexion,$sql);
                    if($consulta){
                        // Conversión de la colsuta a tipo array e 
                        // inicialización del ciclo while para mostrar
                        // los registros
                        while($mostrar=mysqli_fetch_array($consulta)){
                        ?>
                        <!-- fin código php más no del ciclo while -->
                        <!-- Inicio del cuerpo de la tabla -->
                        <tbody>
                            <!-- Inicio de la fila -->
                            <tr>
                                <!-- datos de cada columna en la fila -->
                                <!-- inicio, impresion de los datos y cierre del php -->
                                <td><?php echo $mostrar['num_habitante'] ?></td>
                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['apellido_p'] ?></td>
                                <td><?php echo $mostrar['apellido_m'] ?></td>
                                <td><?php echo $mostrar['id_domicilio'] ?></td>
                                <td><?php echo $mostrar['correo'] ?></td>
                            </tr>
                                <!-- fin de la fila -->
                        </tbody>
                        <!-- fin del cuerpo -->
                        <!-- inicio de php -->
                        <?php
                            // fin ciclo while
                            }
                            // fin condición
                        
                    }
                        ?>
            </table>
        </div>
    </body>
    
</html>