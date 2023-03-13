<!--ventana para Update--->
<div  class="modal fade" id="eventoS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-scrollable">
    <div  class="modal-content">
      <div style="background: rgba(65, 64, 59, 0.445);" class="modal-header">
            <h4 class="modal-title" style="text-align: center; color:white;">
               Juzgamientos por evento
            </h4>
      </div>
      <div style="background: rgba(65, 64, 59, 0.445);" class="modal-body">
      
        <?php 
        
        $sql=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
        $xd=$sql->fetch_object();
        $sql=$conexion->query("SELECT * FROM evento WHERE Id_evento != $xd->Id_evento");

            while ($alt=$sql->fetch_object()) { ?>
            <form method="POST" action="aceptar/evento.php">
              <input type="hidden" name="id" value="<?= $alt->Id_evento;?>">
              <div class="modal-body">
                <button type="submit" style="background: #39A900; border:yellow" class="btn btn-primary"><?= $alt->Nombre; ?></button>
              </div>
              </form>
          <?php } ?>
        
        <div class="modal-footer">
            <button type="button" style="background: red; border:red" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!---fin ventana Update --->
