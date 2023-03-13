<?php
session_start();
if (empty($_SESSION["Id_usuario"])) {
    header("location: ../login/login.php");
    
}else if (!empty($_SESSION["Rol"] != 2)) {

    session_start();
    session_destroy();
    header("location: ../login/login.php");
}

$Id_usuario=$_SESSION['Id_usuario'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cata</title>

    <link rel="stylesheet" href="../css/juzgamiento3.css">
    <link rel="icon" href="../img/Logo.png">
    <!-- llamada de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script>
    function reestablecer() {
        document.getElementById('formul').reset
    };
    function eliminar(){
        var respuesta=confirm("Estás a punto de eliminar un JUZGAMIENTO. ¿Deseas eliminar?");
        return respuesta
    };
    $( document ).ready(function() {
        $('#validarS').modal('toggle')
    });
</script>
</head>
<body>

<!-- div para el boton de regresar -->
	<div id="icon" class="regresar">
        
    </div>

    <div class="buscarC">
        <button type="button" data-bs-toggle="modal" data-bs-target="#validarS">
        Ingresar código
        </button>   
    </div>

<?php 

include "validar.php"; 
include "controladoresJuzgamiento/validar.php";

?>

<script>

    // Obtener el elemento div
    var icon = document.getElementById("icon");

    // Función para actualizar el icono según el ancho de la pantalla
    function updateIcon() {
    var screenWidth = window.innerWidth;
    if (screenWidth <= 760) {
        icon.innerHTML = "<a href='index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
    } else {
        icon.innerHTML = "<a href='index.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>"
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