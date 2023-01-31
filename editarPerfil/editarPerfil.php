<!-- seleccion del id de cada usuario y saber los datos de cada uno de ellos -->
<?php 

include "../config/conexion.php";
$id=$_GET["Id_usuario"];

$sql=$conexion->query(" SELECT * FROM usuarios WHERE Id_usuario=$id ");
$resultados=$sql->fetch_assoc()

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="http://localhost/proyectoalba/css/editarPerfil2.css">
    <link rel="stylesheet" href="../css/editarPerfil2.css">
    <link rel="icon" href="../img/Logo.png">
	    <!-- llamado de los iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>

<div class="container">
    
    <div class="form">

    <h4>Editar perfil</h4>

    <?php 
    include "controladorEditarPerfil.php";
    ?>

    <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="Id_usuario" value="<?= $_GET["Id_usuario"]?>">

        <div class="foto">
                <label>Foto de perfil</label>
                <?php 

                if ($resultados["Foto"] != "") {

                    echo '<img class="fotoPerfil" src="data:image/jpg;base64,'. base64_encode($resultados["Foto"]).'" alt="Foto">';
                    
                } else {

                    echo '<i class="bi bi-person-circle"></i>';
                    
                }
                
                ?>

                <input type="file" accept="image/png, image/gif, image/jpeg" name="foto" value="">
        </div>

        <div class="nombre">
            <label>Nombre</label>
            <input id="limite" class="mayuscula" type="text" name="nombre" value="<?php echo $resultados['Nombre'] ?>">
        </div>

        <div class="apellido">
            <label>Apellido</label>
            <input id="limite" class="mayuscula" type="text" name="apellido" value="<?php echo $resultados['Apellido'] ?>">
        </div>

        <div class="telefono">
            <label>Teléfono</label>
            <input type="tel" name="telefono" value="<?php echo $resultados['Telefono'] ?>">
        </div>

        <div class="contraseña">
            <label>Contraseña</label>
            <input type="text" name="contraseña" value="<?php echo $resultados['Contrasena'] ?>">
        </div>

        <input type="submit" name="editarPerfil" value="Guardar">
        <input type="button" onclick="history.back()" name="regresar" value="Regresar">

    </div>

    </form>



    </div>
	
	<!-- javascript para que al ingresar los datos estos comiecen con letra mayuscula -->
    <script src="../js/mayuscula2.js"></script>

	
	<!-- javascript para poner lmite de caracteres en algunos datos -->
    <script src="../js/limite.js"></script>

</body>
</html>