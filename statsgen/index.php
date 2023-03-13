<?php 
session_start();

if (empty($_SESSION["Id_usuario"])) {
    
    header("location: ../../login/login.php");
    
}else if (!empty($_SESSION["Rol"] != 1) and !empty($_SESSION["Rol"] != 2) and !empty($_SESSION["Rol"] != 3)) {

    session_start();
    session_destroy();
    header("location: ../../login/login.php");

}

$rol = $_SESSION["Rol"];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>


    <link rel="stylesheet" href="../css/resultados3.css">
    <link rel="icon" href="../img/Logo.png">
    <!-- llamada de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <!-- jquery  -->
  <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
</head>
<body>
<script>
    function eliminar(){
        var respuesta=confirm("Estás a punto de eliminar un JUZGAMIENTO. ¿Deseas eliminar?");
        return respuesta
    };
</script>

<input type="hidden" value="<?= $rol ?>" name="rol">

<?php

include('modelo/conexion.php');
$sqlCliente   = ("SELECT categorias.Id_categoria,categorias.Nombre
FROM categorias
INNER JOIN estilos ON categorias.Id_categoria=estilos.fk_categoria
INNER JOIN cerveza ON estilos.Id_estilo = cerveza.fk_estilo
INNER JOIN general on cerveza.Id_cerveza=general.fk_cerveza
WHERE cerveza.fk_estilo = estilos.Id_estilo AND general.Juzgado=1
GROUP BY categorias.Nombre
ORDER BY categorias.Id_categoria ASC");
$queryCliente = mysqli_query($conexion, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);

?>
<?php 
include('ModalAceptar.php'); 
include "modalevento.php";

?>

	<!-- div para poner el boton de regresar -->
	<div id="icon" class="regresar">
		
	</div>

<div class="res">
    <br><br>
    <div class="tabla">        
        <h3 class="resultados">Resultados</h3>
        <table class="">
            
            <thead>
                <tr>
                <!-- <th scope="col">Id juzgamiento</th> -->
                <th scope="col">Categoría</th>
                <th scope="col">Estilo</th>
                <th scope="col">Código</th>
                <th scope="col">Aroma /12</th>
                <th scope="col">Apariencia /3</th>
                <th scope="col">Sabor /20</th>
                <th scope="col">Sensacion /5</th>
                <!-- <th scope="col">Fallas</th> -->
                <th scope="col">Estilo /13</th>
                <th scope="col">Virtud /13</th>
                <th scope="col">Aspecto /13</th>
                <!-- <th scope="col">Comentario</th> -->
                <th scope="col">Nota /10</th>
                <th scope="col">Estadisticas</th>
                </tr>
            </thead>
            <tbody>
                <!-- se muestran datos de la tabla y se hace la consulta -->
                <?php
                include "modelo/conexion.php";
                $sql=$conexion->query("SELECT Id, categorias.Nombre AS Categoria, estilos.Nombre AS Estilo, Ejemplo, Sin_fallas, Maravilloso, Nota, Aroma, Apariencia, Sabor, Sensacion, cerveza.Codigo
                FROM general 
                INNER JOIN cerveza ON general.fk_cerveza=cerveza.Id_cerveza
                INNER JOIN estilos ON cerveza.fk_estilo=estilos.Id_estilo
                INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
                WHERE general.Juzgado=1");
                /* se crea un while para listar los datos y se repite la la cantidad de filas de la tabla*/
                while($datos=$sql->fetch_object()){ 
                ?>
                    <tr>
                        <!-- se debe colocar el nombre de los atributos de la tabla que se mostrarán en la tabla -->
                        <!-- <td><?=$datos->Id?></td> -->
                        <td><?=$datos->Categoria?></td>
                        <td><?=$datos->Estilo?></td>
                        <td><?=$datos->Codigo?></td>
                        <td><?=$datos->Aroma?></td>
                        <td><?=$datos->Apariencia?></td>
                        <td><?=$datos->Sabor?></td>
                        <td><?=$datos->Sensacion?></td>
                        <td><?=$datos->Ejemplo?></td>
                        <td><?=$datos->Sin_fallas?></td>
                        <td><?=$datos->Maravilloso?></td>
                        <td><?=$datos->Nota?></td>
                        
                         <!-- iconos llamados mediante scrpit de font-awesome -->
                         <td>
                            <!-- redireccionamos a la pagina de modificacion y mandamos consigo el valor que hay en la variable -->
                            <a href="stats.php?Id=<?=$datos->Id?>" ><i class="bi bi-graph-up-arrow"></i></a>
                        </td>
                    </tr>
                    <!-- abrimos php para cerrar el html y php -->
                <?php }
                ?>
            </tbody>
            <tfooter>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>
                        <button type="button" style="background: #39A900; font-size: 15px;  border:yellow" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#eventoS">
                        <!-- <i class="bi bi-clipboard-data" style="padding-right: 10px;"></i> -->
                            Evento
                        </button>
                    </td>  
                    
                    
                    <td>
                        <button type="button" style="background: #39A900; border:yellow" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#editChildresn">
                        <i class="bi bi-clipboard-data"></i>
                            General
                        </button>
                    </td>
                </tr>
                
            </tfooter>
            
        </table>

    </div>
    <br>
</div>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(window).on('load',function() {
            $(".cargando").fadeOut(1000);
        });

//Ocultar mensaje
    setTimeout(function () {
        $("#contenMsjs").fadeOut(1000);
    }, 3000);
});
</script>


    <!-- boton regresar para esta interfaz -->
    <script>
        
    var rol = parseInt(document.getElementsByName("rol")[0].value);

      // Obtener el elemento div
      var icon = document.getElementById("icon");

      // Función para actualizar el icono según el ancho de la pantalla
      function updateIcon() {

        var screenWidth = window.innerWidth;

        if (screenWidth <= 760) {
            
            switch(rol) {
        
                case 1:
                    icon.innerHTML = "<a href='../interfacesAdmin/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
                break;

                case 2: 
                    icon.innerHTML = "<a href='../interfacesJuez/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
                break;


                case 3:  
                    icon.innerHTML = "<a href='../interfacesParticipante/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
                break;
            }

          
        } else {
            
            switch(rol) {
        
            case 1:
                icon.innerHTML = "<a href='../interfacesAdmin/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>"
            break;

            case 2: 
                icon.innerHTML = "<a href='../interfacesJuez/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>";
            break;

            case 3:  
                icon.innerHTML = "<a href='../interfacesParticipante/index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>";
            break;
    }

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