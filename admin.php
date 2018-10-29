<?php
   session_start();
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
            
        <div id = "eliminarpreguntasprof" style = "margin-top: 160px; text-align: left; margin-left: 0px; width: 50%">
            <form action = "admin_profesor.php">
                <button type = "submit" name = "submit" value = "eliminarpreguntasprof">Editar preguntas profesor</button>
            </form>
        </div> 
        <div id = "eliminarpreguntaspersonal" style = "text-align: left; margin-left: 0px; width: 50%">
            <form action = "admin_personal.php">
                <button type = "submit" name = "submit" value = "eliminarpreguntasprof">Editar preguntas personales</button>
            </form>
        </div> 
    </body>
</html>