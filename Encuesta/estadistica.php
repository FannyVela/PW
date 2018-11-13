<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "pw")
          or die("Error en la conexion con la bd");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadisticas</title>
        
                <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
     <!--   <link rel="stylesheet" href="css/supersized.css">-->
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/estadistica.css">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 400px; 
	width: 600px;
	float: left;
}

#container2{
    height: 400px; 
    width: 600px;
    float: right; 
}

#container3{
    height: 400px; 
    width: 600px;
    margin: auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        colors: ['#ff8000'],

        chart: {
            type: 'column',
            margin: 95,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }

        },

        exporting: {
                enabled: false
            },

        credits: {
                enabled: false
            },
        title: {
            text: 'Hombre-Mujer'
        },
        subtitle: {
            text: 'Cantidad de hombres y mujeres que han realizado la encuesta'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
            ['Hombre'], ['Mujer']
            ]

        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Sexo',
            data: [
			
			<?php
                $sql=mysqli_query($conexion, "select count(respuesta) from respuesta_est where respuesta = 'hombre'")
                    or die("Fallo hombre");
                $sql = mysqli_fetch_array($sql);
                $sql2 = mysqli_query($conexion, "select count(respuesta) from respuesta_est where respuesta = 'mujer'")
                    or die("Fallo mujer");	
                $sql2 = mysqli_fetch_array($sql2);	
            ?>			
			
			[<?php echo $sql[0]; ?>], [<?php echo $sql2[0]; ?>]
			
			]
        }]
    });
});
		</script>
            <script type="text/javascript">
$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'column',
            margin: 95,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }

        },

        exporting: {
                enabled: false
            },

        credits: {
                enabled: false
            },
        title: {
            text: 'Edad'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
            <?php
                 $sql=mysqli_query($conexion, "select idPreguntaEst from preguntasest where pregunta like 'Edad%'")
                    or die("Fallo idEdad");
                 $sql = mysqli_fetch_array($sql);
                 $consulta = mysqli_query($conexion, "select resultado from opciones where idPreguntaEst = $sql[0]")
                    or die("Error al equiparar ids");
                while($res = mysqli_fetch_array($consulta))
                {
                    echo "['$res[resultado]'],";
                }
            ?>
            ]

        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'edad',
            data: [
            
            <?php
                $consulta = mysqli_query($conexion, "select resultado from opciones where idPreguntaEst = $sql[0]")
                    or die("Error al equiparar ids");

                while($res = mysqli_fetch_array($consulta))
                {
                    //echo $res['resultado'];
                    $contar = mysqli_query($conexion, "select count(respuesta) from respuesta_est where respuesta like '$res[resultado]'")
                        or die("fallo al contar");
                    $contar = mysqli_fetch_array($contar);
                    echo "[$contar[0]], ";
                }
            ?>          
            
            
            
            ]
        }]
    });
});
        </script>
        <script type="text/javascript">
$(function () {
    $('#container3').highcharts({
        colors: ['#ff0000'],

        chart: {
            type: 'column',
            margin: 95,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }

        },

        exporting: {
                enabled: false
            },

        credits: {
                enabled: false
            },
        title: {
            text: 'Puntuación claridad exigencia'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
                
                ['NS'], ['1'], ['2'], ['3'], ['4'], ['5']
            ]

        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Cantidad',
            data: [
            
            <?php
                $sql=mysqli_query($conexion, "select idPregunta from preguntas where pregunta like '%exigir%'")
                    or die("Fallo palabra exigir");
                $sql = mysqli_fetch_array($sql);
                $consulta = mysqli_query($conexion, "select respuesta from respuesta_profesores where id_pregunta = $sql[0]")
                    or die("Fallo id pregunta");
                $array = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                $contns = 0;
                $cont2 = 0;
                $cont3 = 0;
                $cont4 = 0;
                $cont1 = 0;
                $cont5 = 0;
                for($i = 0; $i < sizeof($array); $i++)
                {
                    switch($array[$i]['respuesta'])
                    {
                        case "NS":
                            $contns++;
                            break;
                        case "1":
                            $cont1++;
                            break;
                        case "2":
                            $cont2++;
                            break;
                        case "3":
                            $cont3++;
                            break;
                        case "4":
                            $cont4++;
                            break;
                        case "5":
                            $cont5++;
                            break;
                    }
                }
                echo "[$contns], [$cont1], [$cont2], [$cont3], [$cont4], [$cont5]";
                
            ?>          
            
            
            
            ]
        }]
    });
});
        </script>
	</head>
	<body>

        <script src="Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
        
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
        
        <div id="contenedorGrande">
            <h1 id="estadistica-titulo">ESTADÍSTICAS</h1>
            <div id="container" style="height: 400px"></div>
            <div id = "container2" style = "height: 400px"></div>
            <br>
            <div id = "container3" style = "height: 400px"></div>
            <div style = "width: 100%; margin-top: 35%;">
                <form action = "estadistica.php" method="POST">
                    <label for="input">Introduzca el Id del profesor</label>
                    <input id="input"type = "text" name = "profesor" placeholder="Id profesor">
                    <button type= "submit" name="enviar" style="margin-bottom:30px;">Enviar</button>
                 <!--   <input type="submit" name="enviar"> -->
                </form>
                <br>
                <?php
                   // $profesor = $_POST['enviar'];
                    if(isset( $_POST['enviar']))
                    {
                        $id = $_POST['profesor'];
                        $conexion = mysqli_connect("localhost", "root", "", "pw");
                        $resultado1 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like 'NS'")
                            or die("Error en la consulta");
                        $resultado2 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like '1'")
                            or die("Error en la consulta");
                        $resultado3 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like '2'")
                            or die("Error en la consulta");
                        $resultado4 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like '3'")
                            or die("Error en la consulta");
                        $resultado5 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like '4'")
                            or die("Error en la consulta");
                        $resultado6 = mysqli_query($conexion, "select count(respuesta) from respuesta_profesores where cod_Prof = 
                            $id and respuesta like '5'")
                            or die("Error en la consulta");

                        $resultado1 = mysqli_fetch_array($resultado1);
                        $resultado2 = mysqli_fetch_array($resultado2);
                        $resultado3 = mysqli_fetch_array($resultado3);
                        $resultado4 = mysqli_fetch_array($resultado4);
                        $resultado5 = mysqli_fetch_array($resultado5);
                        $resultado6 = mysqli_fetch_array($resultado6);

                        include("GoogChart.class.php");
                        $chart = new GoogChart();
                        $color = array ( '#b65745', '#7498e9', '#999999',);

                        $nombre = mysqli_query($conexion, "select nombre from profesor where $id = id")
                            or die("Fallo nombre");

                        $nombre = mysqli_fetch_array($nombre);

                        //echo $nombre[0];

                        $dataMultiple = array(
                        "$nombre[0]" => array(
                        NS => $resultado1[0],
                        1 => $resultado2[0],
                        2 => $resultado3[0],
                        3 => $resultado4[0],
                        4 => $resultado5[0],
                        5 => $resultado6[0],
                        ), );
                        $chart->setChartAttrs( array(
                        'type' => 'bar-vertical',
                        'title' => 'Puntuacion: '.$fecha,
                        'data' => $dataMultiple,
                        'size' => array( 400, 300 ),
                        'color' => $color,
                        'labelsXY' => true,
));
                        echo $chart;
                    }
                    ?>
        </div>
</body>
</html>

