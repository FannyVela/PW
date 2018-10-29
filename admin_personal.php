<?php
   session_start();
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
        <link rel="stylesheet" href="css/supersized.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/admin.css">
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
            $conexion = mysqli_connect("localhost", "root", "quevivaperi", "pw")
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
        <div  id = "eliminarpreguntaspersonal" style = "margin-top: 160px; text-align: left; width: 50%; float: left;">
            <h2>Eliminar preguntas personales</h2>
            <form style = "text-align: left; margin-left: 10px; width: 100%;" action = "admin_personal.php" method="POST">
                <?php
                $consulta = mysqli_query ($conexion, "select * from preguntasest")
                    or die ("Fallo en la consulta");
                $nfilas = mysqli_num_rows($consulta);
                for($i=0; $i < $nfilas; $i++)
                {
                    $resultado = mysqli_fetch_array ($consulta);
                    echo ("<td><input type='checkbox' name='borrar[]' VALUE='" .
                    $resultado['idPreguntaEst'] . "'></td>\n");
                    echo $resultado['pregunta'];
                    echo "<br>";
                }
                echo "<br>";
                echo ("<input type='submit' name='eliminar_pregunta_personal' VALUE='Eliminar preguntas marcadas'>\n");
                ?>
            </form>
        </div>

        <div id = "anadir_pregunta_personal" style = "margin-top: 160px; margin-right: 20px;text-align: right; width: 30%; float: right;">
            <h2>Añadir pregunta profesor</h2>
            <form style = "text-align: right;  width: 100%;" action = "admin_personal.php" method="POST">
                <input type = "text" name = "pregunta" placeholder= "Escribe una pregunta">
                <br>
                <input type = "text" name = "opciones" placeholder= "Escribe las opciones separadas por , ej: 50%,60%,70%" required="">
                <br>
                <input type = "submit" name = "anadir_pregunta_personal" value = "Añadir nueva pregunta">
            </form>
        </div> 
    </body>
</html>