<?php

	$p1 = $_POST['i_1'];
	$p2 = $_POST['i_2'];
	$db = new mysqli('mysql.hostinger.es','u641298805_01','12345678','u641298805_01');
	$consulta = sprintf("insert into Palabra(i_1,i_2) values('%s','%s')",$p1,$p2);
	$resultado = $db->query($consulta) or die($db->error);
	header('Location: ../insert/');
?>