<html>
	<head>
		<title>Recibir</title>
		<meta charset="utf-8">

	</head>
	<body>
	<?php 
	$conexion = mysqli_connect("localhost", "root", "quevivaperi", "pw")
        or die("Error en la conexion con la bd");
	
	mysqli_query($conexion, "insert into encuesta() values();");

	//miramos el numero de la encuesta:
	$encuesta = mysqli_query($conexion, "select * from encuesta");
	$nencuesta = mysqli_num_rows($encuesta); 

	$test = mysqli_query($conexion, "select * from preguntasest");
	$ntest = mysqli_num_rows($test);
	for($i = 1; $i <= $ntest; $i++)
	{
		mysqli_query($conexion, "insert into respuesta_est(id_encuesta, respuesta) values ('$nencuesta', '$_POST[$i]');")
		or die("Fallo en la insercion de las respuestas del estudiante");
	}

	$test = mysqli_query($conexion, "select * from preguntas");
	$npreguntas = mysqli_num_rows($test); 

	for($i = -1; $i >= -$npreguntas; $i--)
	{
		mysqli_query($conexion, "insert into respuesta_profesores(id_encuesta, cod_Asig, cod_Prof, respuesta) values ('$nencuesta', 
		  '$_POST[cod_asig]', '$_POST[cod_prof]', '$_POST[$i]');")
		or die("Fallo en la insercion de las respuestas del profesor");
	}

	?>

	</body>

</html>