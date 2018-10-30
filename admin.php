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
        <title>Administración</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
     <!--   <link rel="stylesheet" href="css/supersized.css">-->
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
                    <a href="estadistica.php">Estadísticas</a>
                    <a href="logout.php">Cerrar sesión</a>
                </div>
            </div>
            
        </div>
        <div>
            
        <div id = "eliminarpreguntasprof">
            <form action = "admin_profesor.php">
                <button class="botonLink" type = "submit" name = "submit" value = "eliminarpreguntasprof">Editar preguntas profesor</button>
            </form>
        </div> 
            
        <div id = "eliminarpreguntaspersonal" >
            <form action = "admin_personal.php">
                <button class="botonLink" type = "submit" name = "submit" value = "eliminarpreguntasprof">Editar preguntas personales</button>
            </form>
        </div>
            
        <div>
            <form action = "admin_pregAsig.php">
                <button id = "profesor-asignatura" class="botonLink" type = "submit" name = "submit" value = "profesor-asignatura">Editar profesores y asignaturas</button>
            </form>
        </div>
        
        </div>    

        
        
    </body>
</html>