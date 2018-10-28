<html>
  <head>
    <title>Encuesta</title>
    <meta charset="es">

  <body>
    <center>
      <h1>Encuesta de satisfaccion</h1>

      <form action = "recibir.php" method="POST">
        Codigo de la asignatura:
        <br>
        <input type = "text" name = "cod_asig" value = "">
        <br>
        Codigo del profesor:
        <br>
        <input type = "text" name = "cod_prof" value = "">
        <br>
      </center>
      <div>
      <?php
          $conexion = mysqli_connect("localhost", "root", "quevivaperi", "pw")
          or die("Error en la conexion con la bd");
          $preguntas_est = mysqli_query($conexion, "select * from preguntasest")
          or die("Error al cargar las preguntas");
          $opciones = mysqli_query($conexion, "select * from opciones")
          or die ("Error al cargar las opciones");

          $num_filas = mysqli_num_rows($preguntas_est);
          $num_opciones = mysqli_num_rows($opciones);
          $respuesta = mysqli_fetch_array($opciones);

          echo "<h2>Preguntas de caracter personal: </h2>";
          for($i = 1; $i <= $num_filas; $i++)
          {
            echo "<br>";
            $pregunta = mysqli_fetch_array($preguntas_est);
            echo $i .". ". $pregunta['pregunta'] .": ";
            echo " ";
            for($j = 1; $j <= $num_opciones; $j++)
            {
              
              if($i == $respuesta[idPreguntaEst])
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
            echo "<br>";
          }
       ?>
       </div>

       <div>
        <h1>Preguntas del Profesor</h1>
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
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="NS" checked><?php echo "NS";?>
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="1"><?php echo "1";?>
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="2"><?php echo "2";?>
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="3"><?php echo "3";?>
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="4"><?php echo "4";?>
            <input type="radio" name="<?php echo "-$pregunta[idPreguntas]"; ?>" value="5"><?php echo "5";?>
            <br><br>
            <?php
          }
          ?>
    
      <br>
      <center>
        <input type = "submit" name = "enviar" value = "enviar">
        </center>
        </div>
        </form>
        </center>
        </body>
        </html>

