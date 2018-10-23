<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Encuesta UCA</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "estilo.css">
  </head>

  <body>
    <!-- Aqui parte de arriba con simbolo uca y tal -->
    <form action = "recibir.php" method = "POST">
      <div id = "asignatura">
      <?php
        $conexion = mysqli_connect("localhost", "root", "quevivaperi", "universidad");;
        $res = mysqli_query($conexion, "select distinct asignatura from imparte");
          echo "Asignatura";
          echo "<br>";
          echo "<select name = 'asignatura'>";
            while($lista = mysqli_fetch_array($res))
            {
              echo "<option value =" . $lista["asignatura"] . ">";
              echo $lista["asignatura"] . "</option>";
            }
            echo "</select>";
       ?>
     </div>
     <div id = "perfil">
       <?php
       echo "<h3>Perfil personal</h3>";
       echo "Edad: ";
       echo "<input type = 'text' name = 'edad'>";
       echo "<br>";
       echo "Sexo: ";
       echo "<input type = 'checkbox' name = 'hombre'>Hombre</input>";
       echo " ";
       echo "<input type = 'checkbox' name = 'mujer'>Mujer</input>";
       echo "<br>";
       echo "Curso más alto en el que estas matriculado: ";
       echo "<select name = 'cursoalto'>";
       $i = 1;
       while($i <= 6)
       {
         echo "<option>". $i . "º </option>";
         $i = $i + 1;
       }
       echo "</select>";
       echo "<br>";
       echo "Curso más bajo en el que estas matriculado: ";
       echo "<select name = 'cursobajo'>";
       $i = 1;
       while($i <= 6)
       {
         echo "<option>". $i . "º </option>";
         $i = $i + 1;
       }
       echo "</select>";
       echo "<br>";
       echo "Veces que te has matriculado en esta asigntura: ";
       $i = 1;
       while($i <= 3)
       {
         echo "<input type = 'checkbox' name = 'matriculas' value = ". $i .">" . $i . "</input>";
         $i = $i + 1;
       }
       echo "<input type = 'checkbox' name = 'matriculas' value = '>3'>>3</input>";
       echo "<br>";
       echo "Veces que te has examinado en esta asignatura: ";
       $i = 1;
       while($i <= 3)
       {
         echo "<input type = 'checkbox' name = 'asignatura' value = ". $i .">" . $i . "</input>";
         $i = $i + 1;
       }
       echo "<input type = 'checkbox' name = 'asignatura' value = '>3'>>3</input>";
       echo "<br>";
       echo "La asignatura me interesa [1.Nada 2.Algo 3.Bastante 4.Mucho]: ";
       $i = 1;
       while($i <= 4)
       {
         echo "<input type = 'checkbox' name = 'interes' value = ". $i .">" . $i . "</input>";
         $i = $i + 1;
       }
       echo "<br>";
       echo "Hago uso de tutorias [1.Nada 2.Algo 3.Bastante 4.Mucho]: ";
       $i = 1;
       while($i <= 4)
       {
         echo "<input type = 'checkbox' name = 'tutorias' value = ". $i .">" . $i . "</input>";
         $i = $i + 1;
       }
       echo "<br>";
       echo "Dificultad de la asignatura [1.Baja 2.Algo 3.Bastante 4.Mucho]: ";
       $i = 1;
       while($i <= 4)
       {
         echo "<input type = 'checkbox' name = 'dificultad' value = ". $i .">" . $i . "</input>";
         $i = $i + 1;
       }
       ?>
     </div>
     <br>
      <input type = "submit">
    </form>
  </body>



</html>
