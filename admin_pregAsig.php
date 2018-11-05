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
        <link rel="stylesheet" href=css/admin-pregAsig.css>
    </head>
    <body>
        <div id ="header">
            <img id="logoUca" src="img/Logo_UCA.png">
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
            $eliminar_profesor = $_POST['eliminar_profesor'];
            $anadir_profesor = $_POST['anadir_profesor'];

            $eliminar_asignatura = $_POST['eliminar_asignatura'];
            $anadir_asignatura = $_POST['anadir_asignatura'];
            if(isset($eliminar_profesor))
            {
                $borrar = $_POST['borrar'];
                $nfilas = count($borrar);
                for ($i=0; $i<$nfilas; $i++)
                {
                    mysqli_query($conexion, "delete from profesor where id = $borrar[$i]")
                        or die("Fallo al borrar pregunta");
                }
            }
            if(isset($anadir_profesor))
            {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                mysqli_query($conexion, "insert into profesor (id, nombre) values ('$id', '$nombre');")
                    or die("Fallo al insertar");
            }

            if(isset($eliminar_asignatura))
            {
                $borrar = $_POST['borrar'];
                $nfilas = count($borrar);
                for ($i=0; $i<$nfilas; $i++)
                {
                    mysqli_query($conexion, "delete from asignatura where id = $borrar[$i]")
                        or die("Fallo al borrar pregunta");
                }
            }

            if(isset($anadir_asignatura))
            {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $id_prof = $_POST['idprof'];
                mysqli_query($conexion, "insert into asignatura (id, nombre, id_prof) values ('$id', '$nombre', '$id_prof');")
                    or die("Fallo al insertar");
            }

        ?>

        <div id="eliminarProfesor">
            <h1 >Eliminar profesor</h1><br>
            <form action = "admin_pregAsig.php" method="POST">  
                <?php
                $var = 1;
                $consulta = mysqli_query ($conexion, "select * from profesor")
                    or die ("Fallo en la consulta");
                $nfilas = mysqli_num_rows($consulta);
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
                               
                    echo "<div class= 'preg " . $nom_class . " ' ". " ><br>&nbsp <input type='checkbox' name='borrar[]' VALUE=' " . $resultado['id'] . "'>&nbsp &nbsp" . $resultado['nombre'] . "</div>";
                            
                }
                
                        echo '<button id="boton-eliminar" type="submit" name="eliminar_profesor">Eliminar profesor/es</button>';
                
                ?>
            </form>
        </div>

        <div id="addProfesor">
            <h1>Añadir profesor</h1>
            <form id="form-AddResp"  action = "admin_pregAsig.php" method="POST">
                <input type = "text" name = "id" placeholder= "Escribe el id del profesor">
                <br>
                <input type = "text" name = "nombre" placeholder= "Escribe el nombre del profesor" required="">
                <br>
                <button id="boton-add" type="submit" name="anadir_profesor">Añadir nuevo profesor</button>
           
            </form>
        </div>

        <div id="eliminarAsignatura">
            <h1 >Eliminar asignatura</h1><br>
            <form action = "admin_pregAsig.php" method="POST">  
                <?php
                $var = 1;
                $consulta = mysqli_query ($conexion, "select * from asignatura")
                    or die ("Fallo en la consulta");
                $nfilas = mysqli_num_rows($consulta);
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
                               
                    echo "<div class= 'preg " . $nom_class . " ' ". " ><br>&nbsp <input type='checkbox' name='borrar[]' VALUE=' " . $resultado['id'] . "'>&nbsp &nbsp" . $resultado['nombre'] . "</div>";
                            
                }
                
                        echo '<button id="boton-eliminar" type="submit" name="eliminar_asignatura">Eliminar asignatura/s</button>';
                
                ?>
            </form>
        </div>

        <div id="addProfesor">
            <h1>Añadir asignatura</h1>
            <form id="form-AddResp"  action = "admin_pregAsig.php" method="POST">
                <input type = "text" name = "id" placeholder= "Escribe el id de la asignatura">
                <br>
                <input type = "text" name = "nombre" placeholder= "Escribe el nombre de la asignatura" required="">
                <br>
                <input type = "text" name = "idprof" placeholder="Escribe el id del profesor que imparte la asignatura">
                <br>
                <button id="boton-add" type="submit" name="anadir_asignatura">Añadir nueva asignatura</button>
           
            </form>
        </div>


    </body>
</html>