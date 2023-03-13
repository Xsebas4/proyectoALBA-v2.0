<h4 style="text-align: center;">Aroma</h4>
<!-- mostramos el resultado de la comprobacion -->
<?php            
include "../controladoresJuzgamiento/registroJuzgamiento.php";
?>
<!-- formulario para el ingreso de datos a la base de datos -->
<div class="form-group row">

<!--  <?php
/* include "../config/conexion.php";
$sql=$conexion->query("SELECT Id, Juzgado FROM general WHERE fk_usuario=$Id_usuario AND juzgado=0 LIMIT 0,1");
$next=$sql->fetch_object();  */                               
?> -->

<!--  -->
<input type="hidden" name="Id" readonly value="<?=$next->Id?>">
<!--  -->

</div>
<div class="mb-2 col-sm-14">
<h5>Malta</h5>
<span>
    Bajo
    <input type="range" id="rango1Aroma" name="aroma-malta" min="0" max="13" list="lista-aroma-malta" value="0">
        <datalist id="lista-aroma-malta">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
            <option value="6">
            <option value="7">
            <option value="8">
            <option value="9">
            <option value="10">
            <option value="11">
            <option value="12">
            <option value="13">
        </datalist>
    Alto
</span>
</div>
<div class="mb-2 col-sm-14">
<h5>Lúpulos</h5>
<span>
    Bajo
    <input type="range" id="rango2Aroma" name="aroma-lupulos" min="0" max="13" list="lista-aroma-lupulos" value="0">
        <datalist id="lista-aroma-lupulos">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
            <option value="6">
            <option value="7">
            <option value="8">
            <option value="9">
            <option value="10">
            <option value="11">
            <option value="12">
            <option value="13">
        </datalist>
    Alto
</span>
</div>
<div class="mb-2 col-sm-14">
<h5>Fermentación</h5>
<span>
    Bajo
    <input type="range" id="rango3Aroma" name="aroma-fermentacion" min="0" max="13" list="lista-aroma-fermentacion" value="0">
        <datalist id="lista-aroma-fermentacion">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
            <option value="6">
            <option value="7">
            <option value="8">
            <option value="9">
            <option value="10">
            <option value="11">
            <option value="12">
            <option value="13">
        </datalist>
    Alto
</span>               
</div>
<div class="mb-2 col-sm-14">
    <label>Minimo 100 palabras</label>
    <input type="text" id="aromaDes" name="aroma-descripcion" placeholder="Descripción" required>
    <p id="texto1">0/200 palabras</p>
</div>
<div class="mb-2 col-sm-14">
    <label>Nota Min: 0 Max: 12</label>
<input type="number" id="aromaNota" onkeyup="this.value = MinMaxNumber(this, this.value)" min="0" max="12" name="aroma" placeholder="Nota" required>
</div>   

<div class="boton">
    <!-- <a href="inicioJuez.php"><button>Regresar</button></a> -->
    <button type="button" id="b1" class="bs siguiente" disabled>Siguiente &nbsp&nbsp<i class="bi bi-arrow-right"></i></button>
</div>
