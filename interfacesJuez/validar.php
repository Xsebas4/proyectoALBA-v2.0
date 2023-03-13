<div class="modal" tabindex="-1" id="validarS">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: rgba(65, 64, 59, 0.445);">
        <h5 class="modal-title" style="color: #fff;">Cata</h5>
      </div>
      <div class="modal-body title" style="background: rgba(65, 64, 59, 0.445);">

        <form action="controladoresJuzgamiento/validar.php" method="post">
            <label>Ingrese el código de la cerveza a juzgar</label> 
            <input type="text" name="codigo" id="codigo" placeholder="Codigo de la Cerveza">
            <input type="hidden" name="usuario" value="<?=$Id_usuario?>">
            <button type="submit" style="display:none" name="oculto" id="oculto"></button>
        </form>
      </div>
      <div class="modal-footer botonesModal" style="background: rgba(65, 64, 59, 0.445);">
        <button type="button" style="background: red;" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="accionador">Validar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $( document ).ready(function() {
        $("#accionador").click(function(){
            $("#oculto").click();
        });
    });
</script>