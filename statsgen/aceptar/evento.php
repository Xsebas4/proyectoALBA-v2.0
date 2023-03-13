<?php 
session_start();

if (empty($_SESSION["Id_usuario"])) {
    
    header("location: ../../login/login.php");
    
}else if (!empty($_SESSION["Rol"] != 1) and !empty($_SESSION["Rol"] != 2) and !empty($_SESSION["Rol"] != 3)) {

    session_start();
    session_destroy();
    header("location: ../../login/login.php");

}

?>


<?php

$a=0;
include('modelo/conexion.php');

$id = $_POST['id']; /* el id del evento */

$sql=$conexion->query("SELECT * FROM evento WHERE Id_evento=$id");
$dat=$sql->fetch_object();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>

    <link rel="stylesheet" href="../../css/resultados3.css">
    <link rel="icon" href="../../img/Logo.png">
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

	<!-- div para poner el boton de regresar -->
	<div id="icon" class="regresar">
		
	</div>

<div class="res">
    <br><br>
    <div class="tabla">        
        <h3 class="resultados">Resultados || <?= $dat->Nombre ?></h3>
        
        <table class="">
            
            <thead>
                <tr>

                    <th scope="col">Categoría</th>
                    <th scope="col">Estilo</th>
                    <th scope="col">Código</th>
                    <th scope="col">Aroma /12 &nbsp</th>
                    <th scope="col">Apariencia /3 &nbsp</th>
                    <th scope="col">Sabor /20 &nbsp</th>
                    <th scope="col">Sensacion /5 &nbsp</th>
                    <th scope="col">Estilo /13 &nbsp</th>
                    <th scope="col">Virtud /13 &nbsp</th>
                    <th scope="col">Aspecto /13 &nbsp</th>
                    <th scope="col">Nota /10 &nbsp</th>
                    <th scope="col">Estadisticas</th>

                </tr>
            </thead>
            <tbody>
                <!-- se muestran datos de la tabla y se hace la consulta -->
                <?php
                include "modelo/conexion.php";         

                $sql=$conexion->query("SELECT general.Id, categorias.Nombre AS Categoria, estilos.Nombre AS Estilo, cerveza.Codigo, usuarios.Nombre AS Usuario, rango_competidor.Nombre AS Rango, general.Ejemplo, general.Sin_fallas, general.Maravilloso,  general.Nota, general.Aroma, general.Apariencia, general.Sabor, general.Sensacion
                FROM general
                INNER JOIN cerveza on cerveza.Id_cerveza=general.fk_cerveza
                INNER JOIN usuarios ON cerveza.fk_usuario=usuarios.Id_usuario
                INNER JOIN estilos ON cerveza.fk_estilo=estilos.Id_estilo
                INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
                INNER JOIN rango_competidor ON usuarios.fk_rango_competidor=rango_competidor.Id_rango_competidor
                WHERE general.fk_evento=($dat->Id_evento) AND cerveza.Pendiente=1 AND general.Juzgado=1");
                /* se crea un while para listar los datos y se repite la la cantidad de filas de la tabla*/
                while($datos=$sql->fetch_object()){ 
                    $a=1;
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
                        <!-- <td><?=$datos->Fallas?></td> -->
                        <td><?=$datos->Ejemplo?></td>
                        <td><?=$datos->Sin_fallas?></td>
                        <td><?=$datos->Maravilloso?></td>
                        <!-- <td><?=$datos->Comentario?></td> -->
                        <td><?=$datos->Nota?></td>
                        
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
                    <td></td>
                    <td>

                    <?php if ($a==1) {
                        ?>
                        <a class="estadisticas" href="statsgen.php?id=<?=$id?>">
                            <button type="button">
                                Estadísticas
                            </button>
                        </a>
                        <?php
                    } ?>

                        
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


<script src="../../js/botonRegresar.js"></script>


<script src="../../js/mensajePestana.js"></script>


</body>
</html>