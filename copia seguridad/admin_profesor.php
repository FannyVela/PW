<?php
   session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if($_SESSION['username'] == 'admin')
        {
            
        } else
        {
            echo "PAGINA DISPONIBLE SOLO PARA EL ADMINISTRADOR.<br>";
            echo "<br><a href='login.php'>Login</a>";
            exit;
        }

    } else {
        echo "Esta pagina es solo para usuarios registrados.<br>";
        echo "<br><a href='login.php'>Login</a>";
        echo "<br><br><a href='registrar-usuario.php'>Registrarme</a>";

        exit;
        }
?>
<html>
	<head>
		<meta charset="utf-8">
        <title>Editar profesor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
      <!--  <link rel="stylesheet" href="css/supersized.css"> -->
        <link rel="stylesheet" href="css/admin-profesor.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/admin.css">
        
	</head>

	<body>
		
		<div id ="header">
            <img id="logoUca"src="img/Logo_UCA.png">
            <h1 id="tituloESI">ESCUELA SUPERIOR DE INGENIERÍA</h1>
            <div id="menu">
                <h2 id="welcome-user">¡Bienvenido <?= $_SESSION['username'] ?>!</h2><br>    
                <button id="boton">MENU <img class = "icon" src="img/icono/menu.svg" alt="menu"></button>
                <div class="links">
                    <a href="admin.php">Editar encuesta</a>
                    <a href="#">Estadísticas</a>
                    <a href="logout.php">Cerrar sesión</a>
                </div>
            </div>
        </div> 
		<?php
           
			$conexion = mysqli_connect("localhost", "root", "", "pw")
            	or die("Error al conectar con la bd");
            $conexion->set_charset("utf8");
            $eliminar_pregunta_profesor = $_POST['eliminar_pregunta_profesor'];
            $anadir_pregunta_profesor = $_POST['anadir_pregunta_profesor'];
            if(isset($eliminar_pregunta_profesor))
            {
                $borrar = $_POST['borrar'];
                $nfilas = count($borrar);
                for ($i=0; $i<$nfilas; $i++)
                {
                	echo $borrar[$i];
                    mysqli_query($conexion, "delete from preguntas where idPregunta = $borrar[$i]")
                    	or die("Fallo al borrar");
                }
            }
            if(isset($anadir_pregunta_profesor))
            {
            	$pregunta = $_POST['pregunta'];
            	$consulta = mysqli_query($conexion, "select max(idPregunta) from preguntas")
                    or die("Fallo en la consulta");
                $row = mysqli_fetch_array ($consulta);
                $id = $row[0] + 1;
            	mysqli_query($conexion, "insert into preguntas (idPregunta, pregunta) values ('$id', '$pregunta');")
            		or die("Fallo al insertar");
            }
		?>
		<div  id = "eliminar_preguntasprof">
            <h1 id = "tituloPreg1">Eliminar preguntas profesor</h1><br>
            <form id = "form-PregProf" action = "admin_profesor.php" method="POST">
                <?php
                $consulta = mysqli_query ($conexion, "select * from preguntas")
                    or die ("Fallo en la consulta");
                $nfilas = mysqli_num_rows($consulta);
                
                $var = 1;
                
                for($i=0; $i < $nfilas; $i++)
                {
                    $resultado = mysqli_fetch_array ($consulta);
                    
                    if($var == 1)
                    {
                       $nom_class= "PregTipo1";
                       $var = $var-1;
                    } else
                    {
                        $nom_class = "PregTipo2";
                        $var = $var+1;
                    }
                    
                    echo "<div class= 'pregunt " . $nom_class . " ' ". " ><br>&nbsp<div id='checkbox'> <input type='checkbox' name='borrar[]' VALUE=' " . $resultado['idPregunta'] . "'></div>&nbsp &nbsp<div id='question'>" . $resultado['pregunta'] . "</div><br><br></div>";
                    
                 /*   echo ("<td><input type='checkbox' name='borrar[]' VALUE='" . $resultado['idPregunta'] . "'></td>\n");
                    echo $resultado['pregunta'];
                    echo "<br>"; */
                }
                echo "<br>";
                echo '<button id="boton-eliminar" type="submit" name="eliminar_pregunta_profesor">Eliminar preguntas marcadas</button>';
            
                ?>
            </form>
        </div>

        <div id = "anadir_pregunta_profesor" >
        	<h1 id = "tituloPreg2">Añadir pregunta profesor</h1>
        	<form id="formadd-PregProf" action = "admin_profesor.php" method="POST">
        		<input type = "text" name = "pregunta" placeholder = "Escribe una pregunta">
        		<br>
        		<br>
                <button id="boton-add" type="submit" name="anadir_pregunta_personal">Añadir nueva pregunta</button>
        	</form>
        </div> 
	</body>




</html>