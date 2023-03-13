<h4 style="text-align: center;">Fallas</h4>
<!-- mostramos el resultado de la comprobacion -->
<form method="POST">
<div class="fallasC">
<table>

<?php      

include "../controladoresJuzgamiento/registroJuzgamiento.php";

$sql=$conexion->query("SELECT * FROM fallas");


while ($alt=$sql->fetch_object()) {
    ?>

    <tr>
        <td><?=$alt->Nombre?></td>
        <td>
            <select class="nivel" name="nivel<?=$alt->Id?>" id="nivel">
                <option value=" " selected disabled>Seleccione</option>
                <option value="0">Nulo</option>
                <option value="1">Bajo</option>
                <option value="2">Medio</option>
                <option value="3">Alto</option>
            </select> 
        </td>
    </tr>

    
    <?php
    
}

?>
    
</table>
</div>


</form>

<div class="botones">
    <button class="ba atras4"><i class="bi bi-arrow-left"></i>&nbsp&nbsp Anterior</button>
    <button type="button" id="b5" class="bs siguiente5" disabled>Siguiente &nbsp&nbsp<i class="bi bi-arrow-right"></i></button>
</div>