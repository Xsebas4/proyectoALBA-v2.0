<?php
require_once '../../config/conexion.php';

if (!empty($_POST['steward']) && !empty($_POST['mesasteward'])) {

    $mesas = $_POST['mesasteward'];
    $steward = $_POST['steward'];
    $sql=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
    $x=$sql->fetch_object();
    $count=$x->Mesas;
           

?>
    <div class="beer">
        
        <input type="hidden" name="steward" value="<?=$steward?>">
        <input type="hidden" name="mesas" value="<?=$mesas?>">

        <label>Mesas</label>
        
        <?php
        for ($a = 1; $a <= $mesas; $a++) {
        ?>
            <select name="mesast<?=$a?>" id="mesast<?=$a?>" class="form-control select-mesa">
                <option value="" selected disabled>Seleccione Mesa</option>
                <?php
                for ($i = 1; $i <= $count; $i++) {
                ?>
                    <option value="<?=$i?>">Mesa <?=$i?></option>
                <?php
                };
                ?>
            </select>
        <?php
        };
        ?>
        <div class="boton2">
            <button type="submit" id="steok" name="steok">Generar pdf</button>
        </div> 
    </div>
<?php
}
?>

<script>
$(document).ready(function() {
    $('.select-mesa').change(function() {
        // Obtener el valor seleccionado del select
        var Seleccionada = $(this).val();

        // Ocultar la opción con el valor seleccionado en los select posteriores
        $('.select-mesa').each(function() {
            var opciones = $(this).find('option');
            opciones.each(function() {
                if ($(this).val() == Seleccionada) {
                    $(this).hide();
                }
            });
        });
    });
});

</script>
