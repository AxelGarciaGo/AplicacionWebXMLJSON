<?php
	//header ("Content-type: text/xml");
	include("session.php");
	
	if(isset($_POST['search']))
	{
		$valueToSearh = $_POST['valueToSearh']; 
		$query = "SELECT * FROM users WHERE firstname LIKE '%".$valueToSearh."%' OR lastname LIKE '%".$valueToSearh."%'";
		$result = filterRecord($query);
	}
	else
	{
		$query = "SELECT * FROM users";
		$result = filterRecord($query);
	}
	
	function filterRecord($query)
	{
		include("config.php");
		$filter_result = mysqli_query($mysqli, $query);
		return $filter_result;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/mystyle1.css" /> 

</head>
<body>

<div class="icon-bar">
  <a href="home.php"><i class="fa fa-home"></i></a> 
  <a class="active" href="users.php"><i class="fa fa-user"></i></a> 
  <a href="registration.php"><i class="fa fa-registered"></i></a>
  <a href="print_all.php" target="_blank"><i class="fa fa-print"></i></a>
  <a href="logout.php"><i class="fa fa-power-off"></i></a> 
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Usuarios</h2>
<hr/>

<div class="container">

<form action="" method="POST">
<input type="search" name="valueToSearh" placeholder="Búsqueda">
<button type="submit" class="signupbtn" name="search" >Buscar</button>
</form>
<br />

<?php
	echo "<table border='1'>
	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Segundo Apellido</th>
		<th>Fecha Nacimiento</th>
		<th>Actualizar</th>
		<th>Eliminar</th>
		<th>Imprimir</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['middlename'] . "</td>";
		echo "<td>" . $row['lastname'] . "</td>";
		echo "<td>" . $row['birthdate'] . "</td>";
		echo "<td><a href='edit.php?id=".$row['username']."'><img src='./images/icons8-Edit-32.png' alt='Edit'></a></td>";
		echo "<td><a href='delete.php?id=".$row['username']."'><img src='./images/icons8-Trash-32.png' alt='Delete'></a></td>";
		echo "<td><a href='print.php?id=".$row['username']."'><img src='./images/icons8-Print-32.png' alt='Print'></a></td>";
		echo "</tr>";
	}
	echo "</table>";

	
	
	$query = "SELECT * FROM users";
	$result = filterRecord($query);
	$cadena= mysql_XML($result);
	echo $cadena;

function mysql_XML($resultado)
{
	// creamos el documento XML		
	//header ("Content-type: text/xml");
	$contenido = '&lt; informacion &gt;';
	
	while ($row = mysqli_fetch_array($resultado)) {
		$contenido.="&lt;estudiante&gt;";
		$contenido.="&lt;name&gt;".$row['firstname']."&lt;/name&gt;";
		$contenido.="&lt;primerApellido&gt;".$row['middlename']."&lt;/primerApellido&gt;";
		$contenido.="&lt;segundoApellido&gt;".$row['lastname'] ."&lt;/segundoApellido&gt;";
		$contenido.="&lt;fechaNacimiento&gt;".$row['birthdate']."&lt;/fechaNacimiento&gt;";
		$contenido.="&lt;/estudiante&gt;";		
	}

	$contenido.='&lt; /informacion &gt;';
	//var_dump($contenido);
	echo $contenido;	
	return $contenido;
}
?>
</body>
</html>
//otro
<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "crud_basico";
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM users";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuarios = array(); //creamos un array
while($row = mysqli_fetch_array($result)) 
{ 	
	$nombre=$row['firstname'];
	$apellido1=$row['middlename'];
	$apellido2= $row['lastname'] ;
	$fechaNac=$row['birthdate'];
	
	$usuarios[] = array('nombre'=> $nombre, 'apellido1'=> $apellido1, 'apellido2'=> $apellido2,
						'fechaNac'=> $fechaNac);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($usuarios);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'usuarios.json';
file_put_contents($file, $json_string);
*/
	

?>