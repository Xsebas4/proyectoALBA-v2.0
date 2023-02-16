<?php
if (!empty($_GET["Id"])) {
    $id=$_GET["Id"];
    $sql=$conexion->query("DELETE FROM general WHERE Id=$id");
    if ($sql==1) {
        echo "<div style='color: white;
        padding: 0 0 30px 0;
        text-align: center;
        color: #fff;
        font-size: 20px;'>Juzgamiento eliminado exitosamente</div>";
        
    } else {
        echo "<div style='color: white;
        padding: 0 0 30px 0;
        text-align: center;
        color: #fff;
        font-size: 20px;'>Error en la eliminación</div>";
    }
    
}
?>