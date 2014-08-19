<?php 
	$db = new mysqli('mysql.hostinger.es','u641298805_01','12345678','u641298805_01');
	$consulta = "SELECT * FROM Palabra";
	$resultado = $db->query($consulta) or die($db->error);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Palabras en el Vocabulary</title>
	<style type="text/css">
	table{
		width: 50%;
		text-align: center;
	}
	</style>
</head>
<body>
<center>
<h1>Inglés - Castellano</h1>
<hr>
<table>
<?php 
	while ($row = $resultado->fetch_array()){
		echo "<tr><td>";
		echo $row['i_1'];
		echo "</td><td>";
		echo $row['i_2'];
		echo "</td></tr>";
	}
 ?>
</table>
</body>
</html>