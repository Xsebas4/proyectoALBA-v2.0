<?php
include "../config/conexion.php";
if(!$conexion){
  die("<br/>Sin conexi&oacute;n.");
};
$sql=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
$alt=$sql->fetch_object();
$evento=$alt->Id_evento;
$nombre=$alt->Nombre;


/* obtenemos el numero de mesas que hay */


if($nombre!=""){
    $alt = $conexion->query( "SELECT Mesas FROM evento WHERE Id_evento=($evento)");
    $count=$alt->fetch_object();

    
}else {
    $c=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 1,1");
    $d=$c->fetch_object();

    $alt = $conexion->query("SELECT Mesas FROM evento WHERE Id_evento=($d->Id_evento)");
    $count=$alt->fetch_object(); 

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar mesas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- llamada de iconos -->
    <script src="https://kit.fontawesome.com/123c640fb2.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- llamada de jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>
<body>
    <div>
        <?php include "modales/aceptar.php";?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aceptarS"nname="asignar">
            Asignar Mesas
        </button>
    </div>
    <div >
    <?php include "controlador/asignar_mesa.php";?>
        <form method="POST" id="resultado">
            
                    
            
            
           
        </form>
    </div>
    <div  class="table-responsive">
        <div class="tabla">        
            <h3 class="text-center text-secondary">Jueces y cervezas asignadas || <?=$nombre?></h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <!-- <th scope="col">Id juzgamiento</th> -->
                    <!-- <th scope="col">Id usuario</th> -->
                    <th scope="col">Nombre de la cerveza</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Estilo</th>
                    <th scope="col">Código de la cerveza</th>
                    <th scope="col">Juez</th>
                    <th scope="col">Mesa</th>
                    <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- se muestran datos de la tabla y se hace la consulta -->
                    <?php
                    include "modelo/conexion.php";
                    

                    $sql=$conexion->query("SELECT evento_usuarios.fk_evento,evento_usuarios.fk_usuarios,general.Id,general.fk_usuario, (SELECT Nombre FROM usuarios WHERE Id_usuario=general.fk_usuario) AS Usuario, 
                    cerveza.Nombre AS Cerveza, categorias.Nombre AS Categoria, estilos.Nombre AS Estilo, cerveza.Codigo, general.Mesa
                    FROM evento_usuarios
                    INNER JOIN evento ON evento_usuarios.fk_evento=evento.Id_evento
                    INNER JOIN usuarios ON evento_usuarios.fk_usuarios=usuarios.Id_usuario
                    INNER JOIN cerveza ON usuarios.Id_usuario=cerveza.fk_usuario
                    INNER JOIN general ON general.fk_cerveza=cerveza.Id_cerveza
                    INNER JOIN estilos ON cerveza.fk_usuario=estilos.Id_estilo
                    INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
                    WHERE evento.Id_evento=$evento AND general.Juzgado=0");
                    /* se crea un while para listar los datos y se repite la la cantidad de filas de la tabla*/
                    while($datos=$sql->fetch_object()){ 
                    ?>
                        <tr>
                            <!-- se debe colocar el nombre de los atributos de la tabla que se mostrarán en la tabla -->
                            <!-- <td><?=$datos->Id?></td>
                            <td><?=$datos->fk_usuario?></td>
                            <td><?=$datos->Nombre?></td> -->

                            <td><?=$datos->Cerveza?></td>
                            <td><?=$datos->Categoria?></td>
                            <td><?=$datos->Estilo?></td>
                            <td><?=$datos->Codigo?></td>                        
                            <td><?=$datos->Usuario?></td>
                            <td><?=$datos->Mesa?></td>
                            
                            <!-- iconos llamados mediante scrpit de font-awesome -->
                            <td>
                                <!-- redireccionamos a la pagina de modificacion y mandamos consigo el valor que hay en la variable -->
                                <a onclick="return eliminar()" href="jueces.php?Id=<?=$datos->Id?>"class="btn btn-small btn-danger"><i class="bi bi-trash"></i></a>
                                
                            </td>
                        </tr>
                        <!-- abrimos php para cerrar el html y php -->
                    <?php }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>
