<?php
require_once '../../config/conexion.php'; //libreria de conexion a la base

if (!empty($_POST['beer']) and !empty($_POST['mesa']) and !empty($_POST['user'])) {

    $sql = $conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
    $eve=$sql->fetch_object();
    
    $sql = ("SELECT cerveza.Id_cerveza, categorias.Nombre AS categoria, estilos.Nombre AS estilo
    FROM cerveza 
    INNER JOIN estilos ON cerveza.fk_estilo = estilos.Id_estilo 
    INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
    WHERE cerveza.Seleccionada=0");
    $query = mysqli_query($conexion, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);

    /* obtenemos los datos de usuario */
    $sql_2 = "SELECT usuarios.Id_usuario, usuarios.Nombre, rango_juez.Nombre AS Rango
    FROM evento_usuarios 
    INNER JOIN evento ON evento_usuarios.fk_evento = evento.Id_evento
    INNER JOIN usuarios ON evento_usuarios.fk_usuarios=usuarios.Id_usuario
    INNER JOIN rango_juez ON usuarios.fk_rango_juez=rango_juez.Id_rango_juez
    WHERE usuarios.Rol=2 AND evento.Id_evento=($eve->Id_evento) AND usuarios.Seleccionado=0";
    $query_2 = mysqli_query($conexion, $sql_2);
    $filas_2 = mysqli_fetch_all($query_2, MYSQLI_ASSOC);


    $mesa=$_POST['mesa'];
    $beer=$_POST['beer'];
    $user=$_POST['user'];

    $a=0;
    ?>

    <div class="beer">
        
        <h2>Mesa <?=$mesa?></h2>

        <input type="hidden" value="<?=$mesa?>" name="mesa">
        <input type="hidden" value="<?=$beer?>" name="beer">
        <input type="hidden" value="<?=$user?>" name="user">
        <br>
        <label for="cervezas">Cervezas</label>
        <?php

       while ($a < $beer) {
            
            ?>
            <select id="cerveza<?=$a?>" class="form-control select-cerveza" name="cerveza<?=$a?>" >
                <option value="">- Seleccione cervezas -</option>
                <?php foreach ($filas as $op): //llenar las opciones del select padre ?>
                <option value="<?=$op['Id_cerveza']?>"><?=$op['categoria']," - ",$op['estilo']?></option>  
                <?php
                endforeach; ?>
            </select>
            <?php
           $a++;
       }
       
        
        ?>
        <br>
        <label for="cata">Catadores</label>
        <?php
		$a=0;
        while ($a < $user) {
            
			?>
            
            <select id="cata<?=$a?>" class="form-control select-cata" name="cata<?=$a?>">
                <option value="">- Seleccione catadores -</option>
                <?php foreach ($filas_2 as $op_2): //llenar las opciones del select padre ?>
                <option value="<?= $op_2['Id_usuario']?>"><?=$op_2['Nombre']," - ",$op_2['Rango']?></option>  
                <?php endforeach; ?>
            </select>   

            <?php
			$a++;
        }
        ?>
        <br>
        

        <div class="boton2">
        <a href="jueces.php"><button style="background: red;">Cerrar</button></a>
        <button type="submit" class="btn btn-primary" name="btnasignar" id="btnasignar" value="ok">Asignar</button>

        </div>
    </div>
<?php
}
?>
<script>
$( document ).ready(function() {
    $('.select-cerveza').change(function() {
        // Obtener el valor seleccionado del select
        var Seleccionada = $(this).val();

        // Ocultar la opción con el valor seleccionado en los select posteriores
        $('.select-cerveza').each(function() {
            var opciones = $(this).find('option');
            opciones.each(function() {
                if ($(this).val() == Seleccionada) {
                    $(this).hide();
                }
            });
        });
    });
    
    //Lo mismo del anterior código pero para select-cata
    $('.select-cata').change(function() {
        // Obtener el valor seleccionado del select
        var Seleccionado = $(this).val();

        // Ocultar la opción con el valor seleccionado en los select posteriores
        $('.select-cata').each(function() {
            var opciones = $(this).find('option');
            opciones.each(function() {
                if ($(this).val() == Seleccionado) {
                    $(this).hide();
                }
            });
        });
    });
});
</script>
