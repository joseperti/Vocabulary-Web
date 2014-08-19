<?php 
	$db = new mysqli('mysql.hostinger.es','u641298805_01','12345678','u641298805_01');
	$consulta = "SELECT * FROM Palabra ORDER BY RAND() LIMIT 200;";
	$resultado = $db->query($consulta) or die($db->error);
	$a1 = array();
	$a2 = array();
	while ($row = $resultado->fetch_array()){
		array_push($a1, $row['i_1']);
		array_push($a2, $row['i_2']);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset='utf-8'>
 	<title>Vocabulary</title>
 	<script type="text/javascript" src="../script/jquery.js"></script>
 	<script type="text/javascript">
	 	var array_i_1 = <?php echo json_encode($a1); ?>;
	 	var array_i_2 = <?php echo json_encode($a2); ?>;
	 	var max = array_i_1.length;
	 	var actual = 0;
	 	var correctos = 0;
	 	var errores = 0;
	 	function aleatorio(){
	 		var array_sol = [];
	 		$('.respuesta').off('click');
	 		$('#correcto').html(correctos);
	 		$('#erroneo').html(errores);
	 		actual = Math.floor(Math.random()*max);
	 		$('#p_0').html(array_i_1[actual]);
	 		array_sol.push(array_i_2[actual]);
	 		otro_1 = Math.floor(Math.random()*max);
	 		otro_2 = Math.floor(Math.random()*max);
	 		array_sol.push(array_i_2[otro_2]);
	 		array_sol.push(array_i_2[otro_1]);
	 		array_sol.sort();
	 		$('#p_1').html(" 1.- "+array_sol[0]);
	 		$('#p_2').html(" 2.- "+array_sol[1]);
	 		$('#p_3').html(" 3.- "+array_sol[2]);
	 		if (array_sol[0]==array_i_2[actual]){
	 			console.log('correcto');
	 			$('#p_1').click(function(){
	 				correcto();
	 			});
	 		}else{
	 			console.log('error');
	 			$('#p_1').click(function(){
	 				error();
	 			});
	 		}
	 		if (array_sol[1]==array_i_2[actual]){
	 			console.log('correcto');
	 			$('#p_2').click(function(){
	 				correcto();
	 			});
	 		}else{
	 			console.log('error');
	 			$('#p_2').click(function(){
	 				error();
	 			});
	 		}
	 		if (array_sol[2]==array_i_2[actual]){
	 			console.log('correcto');
	 			$('#p_3').click(function(){
	 				correcto();
	 			});
	 		}else{
	 			console.log('error');
	 			$('#p_3').click(function(){
	 				error();
	 			});
	 		}
	 	}
	 	function correcto(){
	 		correctos++;
	 		vaciar();
	 		aleatorio();
	 	}
	 	function error(){
	 		errores++;
	 		vaciar();
	 		aleatorio();
	 	}
	 	function vaciar(){
	 		$('.respuesta').off('click');
	 		$('#p_1').html(" 1.- ");
	 		$('#p_2').html(" 2.- ");
	 		$('#p_3').html(" 3.- ");
	 	}
	 	$(document).ready(function(){
	 		aleatorio();
	 	});
 	</script>
 	<style type="text/css">
 		body{
 			font-family: Verdana;
 		}
 		.pregunta{
 			background-color: rgb(158,204,179);
 			color: white;
 			font-size: 40px;
 			text-transform: uppercase;
 			font-style: Verdana;
 			font-weight: bolder;
 		}
 		.respuesta{
 			background-color: rgb(131,181,221);
 			color: white;
 			font-size: 40px;
 			text-transform: uppercase;
 			font-style: Verdana;
 			font-weight: bolder;
 		}
 		.respuesta:hover{
 			background-color: rgb(0,107,182);
 		}
 		footer{
 			width: 100%;
 			text-align: center;
 			position: fixed;
 			bottom: 0px;
 			background-color: #FFAAAA;
 		}
 		a{
 			text-decoration: none;
 			color: black;
 		}
 	</style>
 </head>
 <body>
 	<center>
 		<div id="p_0" class="pregunta">Palabra 0</div>
 		<br>
 		<table style="min-width:50%;">
 			<tr id="p_1" class="respuesta"></tr>
	 		<tr id="p_2" class="respuesta"></tr>
	 		<tr id="p_3" class="respuesta"></tr>
 		</table>
 		<footer>
 			Correcto: <span id="correcto">0</span>
 			Errores: <span id="erroneo">0</span>
 			 - <a href="../insert/">Añadir</a>
 		</footer>
 </body>
 </html>