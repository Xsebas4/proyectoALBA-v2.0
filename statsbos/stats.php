<?php 
session_start();

if (empty($_SESSION["Id_usuario"])) {
    
    header("location: ../login/login.php");
    
}else if (!empty($_SESSION["Rol"] != 1) and !empty($_SESSION["Rol"] != 2) and !empty($_SESSION["Rol"] != 3)) {

    session_start();
    session_destroy();
    header("location: ../login/login.php");

}

include "../config/conexion.php";


$ID=$_GET['Id'];

$sql=$conexion->query("SELECT * FROM best WHERE Id=$ID");
?>
<html>
  <head>
    <!-- falta la etiqueta meta, el titulo de la pestaña y el icono -->
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Include boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- llamada de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">



    <title>Estadíticas</title>
    <link rel="stylesheet" href="css/estadisticas2.css">
    <link rel="icon" href="img/Logo.png">

</head>
<body>

	<!-- div para el boton regresar -->
	<div id="icon" class="regresar">
        
    </div>

  <div class="container">
      <!-- Create a canvas element where the radar chart will be rendered -->   

      <canvas id="radarChart"  style="width: 550px; height: 150px;"></canvas>

      <?php

      $datos=$sql->fetch_object();
      
      
      

      /* Suma para el puntaje total */
      $aroma=$datos->Aroma;
      $apariencia=$datos->Apariencia;
      $sabor=$datos->Sabor;
      $sensacion=$datos->Sensacion;
      $nota=$datos->Nota;

      $total=$aroma+$apariencia+$sabor+$sensacion+$nota;

      // Use PHP to collect and process the data needed for the radar chart
      $data = ([
      [($datos->Aroma) * 4.166666667],
      [($datos->Apariencia) * 16.666666667],
      [($datos->Sabor) * 2.5],
      [($datos->Sensacion) * 10],
      [($datos->Nota) * 5]

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
              fontColor: "white",
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
      $sql=$conexion->query("SELECT fallas.Nombre, Nivel FROM best_fallas 
      INNER JOIN fallas ON best_fallas.fk_fallas=fallas.Id 
      WHERE fk_best=$ID");

      $html= "";
      $html.="<div class='text'><div class='fallas'><p><span>Fallas:</span> ";

      while ($test=$sql->fetch_object()) {
        $html.= $test->Nombre;
        if ($test->Nivel == 1) {
          $html.=" - Bajo";
        }elseif ($test->Nivel==2) {
          $html.=" - Medio";
        }else {
          $html.=" - Alto";
        }
      }

      $html.="</p></div> <div class='comentario'><span>Comentarios:</span> ";
      /* comentarios */
      $sql=$conexion->query("SELECT * FROM comentarios WHERE fk_best=$ID");
      while ($adc=$sql->fetch_object()) {
        $html.= "<p>".$adc->Comentario."</p>";
      }
      $html.="</div>
      </div>";

        if ($total>=0 and $total<=13) {

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Problemático (0-13)</p>";
          echo "<p>Sabores y aromas indeseados dominan.</p></div></div>";
          
          echo $html;

        }
        if ($total>=14 and $total<=20) {

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Razonable (14-20)</p>";
          echo "<p>Off flavors/aromas o deficiencias grandes de estilo.</p></div></div>";

          echo $html;
          
        }
        if ($total>=21 and $total<=29) {

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Bueno (21-29)<p>";
          echo "<p>Pierde puntos en precisión de estilo y / o defectos de menor importancia.<p></div></div>";

          echo $html;
          
        }
        if ($total>=30 and $total<=37) {

          if($total>=34 && $total<37){
            $sql=$conexion->query("INSERT INTO cerveza (Medalla) VALUES ('Bronce') WHERE Id_cerveza=$datos->fk_cerveza");
            echo '<div class = "medalla">Bronce</div>';
          }

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Muy Bueno (30-37)</p>";
          echo "<p>En general dentro de los parámetros del estilo, con pequeños defectos.</p></div></div>";

          echo $html;
          
        }
        if ($total>=38 and $total<=44) {

          if ($total>=37 && $total<40) {
            $sql=$conexion->query("UPDATE cerveza SET Medalla = 'Plata' WHERE Id_cerveza=$datos->fk_cerveza");
            echo '<div class = "medalla">Plata</div>';
          }elseif ($total>=40) {
            $sql=$conexion->query("UPDATE cerveza SET Medalla = 'Oro' WHERE Id_cerveza=$datos->fk_cerveza");
            echo '<div class = "medalla">Oro</div>';
          }

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Excelente (38-44)</p>";
          echo "<p>Ejemplifica bien el estilo, requiere pequeños ajustes.</p></div></div>";

          echo $html;
          
        }
        if ($total>=45 and $total<=50) {

          $sql=$conexion->query("UPDATE cerveza SET Medalla='Oro' WHERE Id_cerveza=$datos->fk_cerveza");
          echo '<div class = "medalla">Oro</div>';

          /* echo "<div class='total'>$total</div>"; */
          echo "<div class='p2'><p>Sobresaliente (45-50)<br>";
          echo "Ejemplo de clase mundial del estilo</p></div></div>";

          echo $html;
          
        }
        else {
          echo "ERROR 404";
        }


      ?>
    </div>

  </div>

  <br>

</body>
</html>