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
        <title>Editar preguntas personales</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
       <!-- <link rel="stylesheet" href="css/supersized.css">-->

        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href=css/admin-personal.css>
    </head>
    <body>
        <div id ="header">
            <img src="img/Logo_UCA.png" style="margin-top: 20px; margin-left: 40px; float:left;">
            <h1 style="float:left; margin-left: 23%; margin-top: 4%; color:#eaf1f7;">ESCUELA SUPERIOR DE INGENIERÍA</h1>
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
            $eliminar_pregunta_personal = $_POST['eliminar_pregunta_personal'];
            $anadir_pregunta_personal = $_POST['anadir_pregunta_personal'];
            if(isset($eliminar_pregunta_personal))
            {
                $borrar = $_POST['borrar'];
                $nfilas = count($borrar);
                for ($i=0; $i<$nfilas; $i++)
                {
                    mysqli_query($conexion, "delete from preguntasest where idPreguntaEst = $borrar[$i]")
                        or die("Fallo al borrar pregunta");
                    mysqli_query($conexion, "delete from opciones where idPreguntaEst = $borrar[$i]")
                        or die("Fallo al borrar opcion");
                }
            }
            if(isset($anadir_pregunta_personal))
            {
                $consulta = mysqli_query($conexion, "select max(idPreguntaEst) from preguntasest")
                    or die("Fallo en la consulta");
                $row = mysqli_fetch_array ($consulta);
                $id = $row[0] + 1;
                $pregunta = $_POST['pregunta'];
                mysqli_query($conexion, "insert into preguntasest (idPreguntaEst, pregunta) values ('$id', '$pregunta');")
                    or die("Fallo al insertar");
                $opciones = explode(",", $_POST['opciones']);
                for($i = 0; $i < count($opciones); $i++)
                {
                    mysqli_query($conexion, "insert into opciones (idPreguntaEst, resultado) values ('$id', '$opciones[$i]')")
                        or die("Error al insertar opciones");
                }
            }
        ?>
        <div  id = "eliminarpreguntaspersonal">
            <h1 id="titulo1" >Eliminar preguntas personales</h1><br>
            <form id="form-PregPersonales" action = "admin_personal.php" method="POST">
                <?php
                $var = 1;
                $consulta = mysqli_query ($conexion, "select * from preguntasest")
                    or die ("Fallo en la consulta");
                $nfilas = mysqli_num_rows($consulta);
                for($i=0; $i < $nfilas; $i++)
                {
                    $resultado = mysqli_fetch_array ($consulta);
                  /*  echo ("<td><input type='checkbox' name='borrar[]' VALUE='" . $resultado['idPreguntaEst'] . "'></td>\n");
                    echo '<div id="absolut">'. $resultado['pregunta'] .'</div>'; */
                    if($var == 1)
                    {
                       $nom_class= "PregTipo1";
                       $var = $var-1;
                    } else
                    {
                        $nom_class = "PregTipo2";
                        $var = $var+1;
                    }
                               
                    echo "<div class= 'preg " . $nom_class . " ' ". " ><br>&nbsp <input type='checkbox' name='borrar[]' VALUE=' " . $resultado['idPreguntaEst'] . "'>&nbsp &nbsp" . $resultado['pregunta'] . "</div>";
                            
                }
                
                echo '<button id="boton-eliminar" type="submit" name="eliminar_pregunta_personal">Eliminar preguntas marcadas</button>';
                
                ?>
            </form>
        </div>

        <div id = "anadir_pregunta_personal">
            <h1 id="titulo2">Añadir pregunta profesor</h1>
            <form id="form-AddResp"style = "text-align: right;  width: 100%;" action = "admin_personal.php" method="POST">
                <input type = "text" name = "pregunta" placeholder= "Escribe una pregunta">
                <br>
                <input type = "text" name = "opciones" placeholder= "Escribe las opciones separada. Ej: 5%,6%,7%" required="">
                <br>
                <button id="boton-add" type="submit" name="anadir_pregunta_personal">Añadir nueva pregunta</button>
           
            </form>
        </div> 
    </body>
</html>