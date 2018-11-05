<html>
	<head>
		<title>Recibir</title>
		<meta charset="utf-8">

	</head>
	<body>
	<?php 
	$conexion = mysqli_connect("localhost", "root", "", "pw")
        or die("Error en la conexion con la bd");
	
	mysqli_query($conexion, "insert into encuesta() values();");

	//miramos el numero de la encuesta:
	$encuesta = mysqli_query($conexion, "select * from encuesta");
	$nencuesta = mysqli_num_rows($encuesta); 

	$test = mysqli_query($conexion, "select * from preguntasest");
        
    while($ids = mysqli_fetch_array($test))
    {
        $j = $ids['idPreguntaEst'];
        mysqli_query($conexion,"insert into respuesta_est(id_encuesta, id_pregunta, respuesta) values ('$nencuesta', '$j',
		   '$_POST[$j]');")
		or die("Fallo en la insercion de las respuestas del profesor");
    }
    
	$test = mysqli_query($conexion, "select * from preguntas");
   
    while($ids = mysqli_fetch_array($test))
    {
        $j = $ids['idPregunta']*-1;
        mysqli_query($conexion,"insert into respuesta_profesores(id_encuesta, id_pregunta, cod_Asig, cod_Prof, respuesta) values ('$nencuesta', '$ids[idPregunta]',
		  '$_POST[cod_asig]', '$_POST[cod_prof]', '$_POST[$j]');")
		or die("Fallo en la insercion de las respuestas del profesor");
    }
        
	?>

	</body>

</html>