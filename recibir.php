<html>
	<head>
		<title>Recibir</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
     <!--   <link rel="stylesheet" href="css/supersized.css">-->
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/encuesta-usuario.css">

	</head>
	<body>
		<div id ="header">
            <img id="logoUca"src="img/Logo_UCA.png">
            <h1 id="tituloESI">ESCUELA SUPERIOR DE INGENIERÍA</h1>
            <div id="menu">
                <h2 id="welcome-user">¡Bienvenido <?= $_SESSION['username'] ?>!</h2><br>    
                <a id="cerrar-sesion" href="logout.php">Cerrar sesión</a>
            </div>
            
        </div>
        <center style = "margin-top: 20%;">Gracias por realizar la encuesta</center>
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