<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Iniciar sesión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/supersized.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main.css">


    </head>

    <?php

        session_start();

        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "pw";
        $tbl_name = "usuarios";

        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
       

        if ($conexion->connect_error) {
         die("La conexion falló: " . $conexion->connect_error);
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = $_POST['username'];/* Variables que guardan el nombre de usuario y */
            $password = $_POST['password']; /*password entrados por el usuario en el formulario */

            $sql = "SELECT * FROM $tbl_name WHERE username = '$username'"; // $sql guarda la consulta SQL que verifica si el nombre de usuario  ya existe en la base de datos.

            $result = $conexion->query($sql); // guarda el resultado de la función query() usando como parámetro el resultado de la variable $sql.


            if ($result->num_rows > 0) {
             }
             $row = $result->fetch_array(MYSQLI_ASSOC);
             if (password_verify($password, $row['password'])) {

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                echo "Bienvenido! " . $_SESSION['username'];

                if($row['administrador'] == 1)
                    header('Location: admin.php');
                 else
                     header('Location: encuesta-usuario.php');

             } else {
                 $_SESSION['message']= "Username o Password estan incorrectos.";
             }
        } else{
            $_SESSION['message'] = '';
        } 
      mysqli_close($conexion);
    ?>

    <body style="display:block;">

    <div id ="header">
        <img src="img/Logo_UCA.png" style="margin-top: 20px; margin-left: 40px; float:left;">
        <h1 style="float:left; margin-left: 26%; margin-top: 4%; color:#eaf1f7;">ESCUELA SUPERIOR DE INGENIERÍA</h1>
    </div>
        
        <div class="page-container">
        
            <h1 style="color:#294a55;">Inicia sesión</h1>
            <form action="login.php" method="post">
                <div id="error"><?= $_SESSION['message'] ?></div>
                <input type="text" name="username" class="username" placeholder="Username" >
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit" name="Submit" value ="LOGIN">Iniciar sesión</button><br><br>
                O <a href="registrar-usuario.php">Registrate</a>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/scripts.js"></script>

    </body>

</html>

