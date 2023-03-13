<?php 
include "../config/conexion.php"; 

$sql=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
$alt=$sql->fetch_object();
$eve=$alt->Id_evento;

$sql=$conexion->query("SELECT best.Id, categorias.Nombre AS Categoria, estilos.Nombre AS Estilo, cerveza.Codigo, usuarios.Nombre AS Usuario, rango_competidor.Nombre AS Rango, best.Ejemplo, best.Sin_fallas, best.Maravilloso,  best.Nota, best.Aroma, best.Apariencia, best.Sabor, best.Sensacion
FROM best
INNER JOIN cerveza on cerveza.Id_cerveza=best.fk_cerveza
INNER JOIN usuarios ON cerveza.fk_usuario=usuarios.Id_usuario
INNER JOIN estilos ON cerveza.fk_estilo=estilos.Id_estilo
INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
INNER JOIN rango_competidor ON usuarios.fk_rango_competidor=rango_competidor.Id_rango_competidor
WHERE best.fk_evento=$eve AND best.Juzgado=1
ORDER BY best.fk_cerveza ASC");

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best of show</title>
    <link rel="stylesheet" href="../css/statsbos.css">
    <link rel="icon" href="../img/Logo.png">
    <!-- llamada de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>

<input type="hidden" value="<?= $rol ?>" name="rol">

<!-- div para poner el boton de regresar -->
	<div id="icon" class="regresar">
		
	</div>

<div class="res">
    <br><br>
    <div class="tabla">
    <h1>Best of show</h1>
    <table>
        <thead>
            <tr>
                <th>Categoría </th>
                <th>Estilo </th>
                <th>Código </th>
                <th>Aroma /12 </th>
                <th>Apariencia /3 </th>
                <th>Sabor /20 </th>
                <th>Sensacion /5 </th>
                <th>Estilo /13 </th>
                <th>Virtud /13 </th>
                <th>Aspecto /13 </th>
                <th>Nota /10 </th>
                <th>Estadisticas</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($alt=$sql->fetch_object()) {?>
            <tr>
                
                <td><?=$alt->Categoria?></td>
                <td><?=$alt->Estilo?></td>
                <td><?=$alt->Codigo?></td>
                <td><?=$alt->Aroma?></td>
                <td><?=$alt->Apariencia?></td>
                <td><?=$alt->Sabor?></td>
                <td><?=$alt->Sensacion?></td>
                <td><?=$alt->Ejemplo?></td>
                <td><?=$alt->Sin_fallas?></td>
                <td><?=$alt->Maravilloso?></td>
                <td><?=$alt->Nota?></td>
                <td>
                    <!-- redireccionamos a la pagina de modificacion y mandamos consigo el valor que hay en la variable -->
                    <a href="stats.php?Id=<?=$datos->Id?>" ><i class="bi bi-graph-up-arrow"></i></a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
    <br>
</div>

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