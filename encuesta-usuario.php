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
        
      <center>
          <h1 style="margin-top:250px;">Encuesta de satisfaccion</h1><br>

          <form style="margin:0;" action = "recibir.php" method="POST">
            Codigo de la asignatura:
            <br>
            <input type = "text" name = "cod_asig" value = "">
            <br><br>
            Codigo del profesor:
            <br>
            <input type = "text" name = "cod_prof" value = "">
            <br><br><br>
      </center>
          
      <div>
      <?php
           
          $conexion = mysqli_connect("localhost", "root", "", "pw")
          or die("Error en la conexion con la bd");
          $conexion->set_charset("utf8");
          $preguntas_est = mysqli_query($conexion, "select * from preguntasest")
          or die("Error al cargar las preguntas");
          $opciones = mysqli_query($conexion, "select * from opciones")
          or die ("Error al cargar las opciones");

          $num_opciones = mysqli_num_rows($opciones);
          $respuesta = mysqli_fetch_array($opciones);
                    
         $cont = 1;

          echo "<h1>Preguntas de caracter personal: </h1><br>";
          while($i = mysqli_fetch_array($preguntas_est))
          {
            echo "<br>";
            
            echo $cont .". ". $i['pregunta'] .": ";
            $id = $i['idPreguntaEst'];
            echo " ";
            for($j = 1; $j <= $num_opciones; $j++)
            {
              
              if($id == $respuesta['idPreguntaEst'])
              {
                echo "$respuesta[resultado]";
                if($j == 1)
                {
                  ?>
                  <input type = "radio" name = "<?php echo "$respuesta[idPreguntaEst]";?>"
                  value = "<?php echo "$respuesta[resultado]"?>" checked>
                  <?php
                }
                else{
                  ?>
                  <input type = "radio" name = "<?php echo "$respuesta[idPreguntaEst]";?>"
                  value = "<?php echo "$respuesta[resultado]"?>">
                  <?php
                }
                $respuesta = mysqli_fetch_array($opciones);
              }
              
            }
            echo "<br><br>";
            $cont = $cont+1;
          }
       ?>
       </div>

       <div>
        <h1>Preguntas del Profesor</h1><br>
          <?php
          $preguntas = mysqli_query($conexion, "select * from preguntas")
          or die("Error al cargar las preguntas");
          $num_filas = mysqli_num_rows($preguntas);

          for($i = 1; $i <= $num_filas; $i++)
          {
            $pregunta = mysqli_fetch_array($preguntas);
            echo "$i. $pregunta[pregunta]";
            ?>
            <br>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="NS" checked><?php echo "NS";?>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="1"><?php echo "1";?>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="2"><?php echo "2";?>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="3"><?php echo "3";?>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="4"><?php echo "4";?>
            <input type="radio" name="<?php echo "-$pregunta[idPregunta]"; ?>" value="5"><?php echo "5";?>
            <br><br>
            <?php
          }
          ?>
    
      <br>
      <center>
          
        <button type = "submit" name = "enviar" value = "enviar">Enviar</button>
        </form>
        </center>
       </div>
        
    </body>
</html>