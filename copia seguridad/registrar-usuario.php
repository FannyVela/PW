<html>
    <head>

        <meta charset="utf-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
       <!-- <link rel="stylesheet" href="css/supersized.css"> -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main.css">

    </head>

    <?php
    session_start();
    $_SESSION['message']='';
    $_SESSION['mensaje'] = '';

     $host_db = "localhost";
     $user_db = "root";
     $pass_db = "";
     $db_name = "pw";
     $tbl_name = "usuarios";

     $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
     die("La conexion falló: " . $conexion->connect_error);
    }   

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Comprobamos que las dos contraseñas son iguales
        if($_POST['password']  ==$_POST['repeatpassword'])
        {
           $form_pass = $_POST['password'];
           $hash = password_hash($form_pass, PASSWORD_BCRYPT);

           $buscarUsuario = "SELECT * FROM $tbl_name WHERE username = '$_POST[username]' ";
           $result = $conexion->query($buscarUsuario);

           $count = mysqli_num_rows($result);

           if ($count == 0) //significa que no existe ningun usuario con ese nombre
           {
               $query = "INSERT INTO Usuarios (username, password) VALUES ('$_POST[username]', '$hash')";

               if ($conexion->query($query) === TRUE)
               {
                    $_SESSION['mensaje'] = "Usuario registrado con éxito";
                    header("Location: login.php");
                } else {
                    $_SESSION['message'] = "* ERROR: El usuario no se ha podido añadir con éxito.". $query . "<br>" . $conexion->error;
                }

           } else{
               $_SESSION['message'] = "* ERROR: Ya existe un usuario con ese nombre. Por favor escoja otro."; 
           }
        } else {
             $_SESSION['message'] = "* ERROR: Las contraseñas no coinciden";
          }

    }

     mysqli_close($conexion);   
    ?>

    <body>

    <div id ="header">
        <img src="img/Logo_UCA.png" style="margin-top: 20px; margin-left: 40px; float:left;">
        <h1 style="float:left; margin-left: 26%; margin-top: 4%; color:#eaf1f7;">ESCUELA SUPERIOR DE INGENIERÍA</h1>
    </div>

        <div class="page-container">
            <h1 style="color:#294a55;">Registro</h1>
            <form action="registrar-usuario.php" method="post">
                <div id="error"><?= $_SESSION['message'] ?></div>
                <input type="text" name="username" class="username" placeholder="Username" >
                <input type="password" name="password" class="password" placeholder="Password">
                <input type="password" name="repeatpassword" class="password" placeholder="RepeatPassword">
                <button type="submit" name="Submit" value ="Registrarme">Enviar</button><br><br>
                O <a href="login.php">Inicia sesión </a>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/scripts.js"></script>

    </body>
    
    
</html>