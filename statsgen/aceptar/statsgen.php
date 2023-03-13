<?php 
session_start();

if (empty($_SESSION["Id_usuario"])) {
    
    header("location: ../../login/login.php");
    
}else if (!empty($_SESSION["Rol"] != 1) and !empty($_SESSION["Rol"] != 2) and !empty($_SESSION["Rol"] != 3)) {

    session_start();
    session_destroy();
    header("location: ../../login/login.php");

}
  
    include "modelo/conexion.php";

    $id=$_GET['id'];
    $sql=$conexion->query("SELECT * FROM categorias WHERE Id_categoria=$id");
    $alt=$sql->fetch_object();

    $sql_4 = ("SELECT general.Ejemplo,general.Maravilloso,general.Sin_fallas,general.Nota,general.Aroma,general.Apariencia,general.Sabor,general.Sensacion,cerveza.Codigo, categorias.Nombre AS Categoria,cerveza.Medalla, cerveza.Adiciones
    FROM general 
    INNER JOIN cerveza ON general.fk_cerveza=cerveza.Id_cerveza
    INNER JOIN estilos ON estilos.Id_estilo=cerveza.fk_estilo
    INNER JOIN categorias ON categorias.Id_categoria=estilos.fk_categoria
    WHERE general.Juzgado=1 AND categorias.Id_categoria=$id");
    $query_4 = mysqli_query($conexion, $sql_4);
    $cantidad     = mysqli_num_rows($query_4);


    $aromatot=0;
    $aparienciatot=0;
    $sabortot=0;
    $sensaciontot=0;
    $notatot=0;
    $fallatot="";
    $comentariotot="";

    while ($data = mysqli_fetch_array($query_4)) { 
    
    $aroma=$data['Aroma'];
    $apariencia=$data['Apariencia'];
    $sabor=$data['Sabor'];
    $sensacion=$data['Sensacion'];
    $nota=$data['Nota'];

    $aromatot=$aromatot+$aroma;
    $aparienciatot=$aparienciatot+$apariencia;
    $sabortot=$sabortot+$sabor;
    $sensaciontot=$sensaciontot+$sensacion;
    $notatot=$notatot+$nota;
    
    }

$aromatot=$aromatot/$cantidad; 
$aparienciatot=$aparienciatot/$cantidad;
$sabortot=$sabortot/$cantidad;
$sensaciontot=$sensaciontot/$cantidad; 
$notatot=$notatot/$cantidad;

$total=$aromatot+$aparienciatot+$sabortot+$sensaciontot+$notatot;
?>
<html>
  <head>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Include boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- llamada de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    


    <title>Estadíticas</title>
    <link rel="stylesheet" href="../../css/estadisticas2.css">
    <link rel="icon" href="../../img/Logo.png">

  </head>
<body>

      	<!-- div para el boton regresar -->
	<div id="icon" class="regresar">
        
    </div>

  <div class="container">
      <!-- Create a canvas element where the radar chart will be rendered -->   
      <h2>Promedio <?=$alt->Nombre?></h2>
      <canvas id="radarChart"  style="width: 550px; height: 150px;"></canvas>

      <?php
      // Use PHP to collect and process the data needed for the radar chart
      $data = ([
      [$aromatot * 4.166666667],
      [$aparienciatot * 16.666666667],
      [$sabortot * 2.5],
      [$sensaciontot * 10],
      [$notatot * 5]

      ]);
      ?>
  <!--  4.166666667   el de 12-->
  <!-- 16.666666667   el de 3 -->
  <!-- 2.5            el de 20 -->
  <!-- 10             el de 5 -->
  <!-- 5              el de 10 -->
      <script>
        var options = {
          responsive: true,
          scale:{
            gridLines: {
              color: "black",
              lineWidth: 0.5
            },
            ticks: {
              beginAtZero: true,
              min: 0,
              max: 50,
              stepSize: 10,
              display: false
            },
            pointLabels: {
              fontSize: 13.5,
              fontColor: "white"
            }
          },
          legend: {
            display:false         
          },
            
            
        }
        
      // Use JavaScript and Chart.js to generate the radar chart
      var ctx = document.getElementById('radarChart').getContext('2d');
      var chart = new Chart(ctx, {
          type: 'radar',
          data: {
              labels: ['Aroma', 'Apariencia', 'Sabor', 'Sensación', 'General'],
              datasets: [{
                backgroundColor: "rgba(167, 42, 167, 0.541)",
                borderColor: "#39A900",
                pointRadius: 0,
                data: <?php echo json_encode($data); ?>
              }]
          },
          options:  options
          
        });
      </script>

      <hr>

      <div class="container2">
          <?php
            echo "<div class='total'>Tu nota es:</div>";
            echo "<div class='total'><span>$total</span></div>";
          ?>
      </div>

    <div class="comentarios">
      <?php

        /* fallas */
      $sql=$conexion->query("SELECT fallas.Nombre, Nivel FROM general_fallas 
      INNER JOIN fallas ON general_fallas.fk_fallas=fallas.Id 
      INNER JOIN general ON general.Id = general_fallas.fk_general
      WHERE general.fk_cerveza=$id");

      $html= "";
      $html.="<div class='text'><div class='fallas'><p><span>Fallas:</span> ";

      while ($test=$sql->fetch_object()) {
        $html.= $test->nombre;
        if ($test->Nivel == 1) {
          $html.=" - Bajo";
        }elseif ($test->Nivel ==2) {
          $html.=" - Medio";
        }else {
          $html.=" - Alto";
        }
      }

      $html.="</p></div> <div class='comentario'><span>Comentarios:</span>";

      /* comentarios */
      $sql=$conexion->query("SELECT fk_general, Comentario FROM comentarios 
      INNER JOIN general ON general.Id = comentarios.fk_general 
      WHERE general.fk_cerveza=$id");

      while ($adc=$sql->fetch_object()) {
        $html.= "</p>".$adc->Comentario."</p>";
      }
      $html.="</div>
      </div>";

        if ($total>=0 and $total<=13) {

          /* echo "$total"; */
          echo "<div class='p2'><p>Problemático (0-13)<br>";
          echo "Sabores y aromas indeseados dominan.</p></div></div>";
          
          echo $html;

        }
        if ($total>=14 and $total<=20) {
          
          /* echo "$total"; */
          echo "<div class='p2'><p>Razonable (14-20)<br>";
          echo "Off flavors/aromas o deficiencias grandes de estilo.</p></div></div>";
          
          echo $html;

        }
        if ($total>=21 and $total<=29) {
          
          /* echo "$total"; */
          echo "<div class='p2'><p>Bueno (21-29)<br>";
          echo "Pierde puntos en precisión de estilo y / o defectos de menor importancia.<p></div></div>";
          
          echo $html;

        }
        if ($total>=30 and $total<=37) {
        
          /* echo "$total"; */
          echo "<div class='p2'><p>Muy Bueno (30-37)<br>";
          echo "En general dentro de los parámetros del estilo, con pequeños defectos.</p></div></div>";
        
          echo $html;

        }
        if ($total>=38 and $total<=44) {
          
          /* echo "$total"; */
          echo "<div class='p2'><p>Excelente (38-44)<br>";
          echo "Ejemplifica bien el estilo, requiere pequeños ajustes.</p></div></div>";
          
          echo $html;

        }
        if ($total>=45 and $total<=50) {

          /* echo "$total"; */
          echo "<div class='p2'><p>Sobresaliente (45-50)<br>";
          echo "Ejemplo de clase mundial del estilo.</p></div></div>";
          
          echo $html;

        }

      ?>
    </div>
     
  </div>
  <br>

<!-- boton regresar para esta interfaz -->
<script>
      // Obtener el elemento div
      var icon = document.getElementById("icon");

      // Función para actualizar el icono según el ancho de la pantalla
      function updateIcon() {
        var screenWidth = window.innerWidth;
        if (screenWidth <= 760) {
          icon.innerHTML = "<a href='../index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
        } else {
          icon.innerHTML = "<a href='../index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>"
        }
      }

      // Ejecutar la función al cargar la página
      updateIcon();

      // Ejecutar la función cada vez que cambia el tamaño de la pantalla
      window.addEventListener("resize", function() {
        updateIcon();
      });

    </script>

</body>
</html>