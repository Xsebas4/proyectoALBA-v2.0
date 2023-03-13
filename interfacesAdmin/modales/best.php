<?php
    
    $sql = "SELECT usuarios.Id_usuario, usuarios.Nombre, rango_juez.Nombre AS Rango
    FROM evento_usuarios 
    INNER JOIN evento ON evento_usuarios.fk_evento = evento.Id_evento
    INNER JOIN usuarios ON evento_usuarios.fk_usuarios=usuarios.Id_usuario
    INNER JOIN rango_juez ON usuarios.fk_rango_juez=rango_juez.Id_rango_juez
    WHERE usuarios.Rol=2 AND evento.Id_evento=($alt->Id_evento) AND usuarios.Seleccionado=1";
    $query = mysqli_query($conexion, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $n =  mysqli_num_rows($query); 

?>
<!-- Modal -->
<div class="modal fade" id="best" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="best" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background: rgba(65, 64, 59, 0.445);">
        <h1 class="modal-title fs-5" id="aceptarS" style="text-align: center; color:white;">Best of show</h1>
      </div>
      <div class="modal-body" style="background: rgba(65, 64, 59, 0.445); overflow: auto;">
        <div>
            <h3 style="color:white">Asignanación BOS</h3>

            <form action="best/best.php" method="POST">
                
                <input type="hidden" value="<?=$alt->Id_evento?>" name="evento">
                
                <br>
                <div class="form">
                  <div class="selecModal">
                  <Label>Jueces BOS</Label>

                      <?php
                      
                      for ($a=0; $a < $n; $a++) {
                          
                          ?>

                          <select id="cata<?=$a?>" class="form-control select-cata" name="cata<?=$a?>">
                              <option value="0">- Seleccione catadores -</option>
                              <?php foreach ($filas as $op): //llenar las opciones del select padre ?>
                              <option value="<?= $op['Id_usuario']?>"><?=$op['Nombre']," - ",$op['Rango']?></option>  
                              <?php endforeach; ?>
                          </select>
                          <br>
              
                          <?php
                      }
                      
                      ?>
                  </div>
                </div>
                <div class="botones" style="background: rgba(65, 64, 59, );">
      
                    <div>
                        <button type="button" style="background: red;" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <button type="submit" name="btnbos" value="ok">Asignar</button>
        
                 </div>
                
            </form>
        </div>
      </div>
      
      
      
      
    </div>
  </div>
 
</div>
<script>
    $( document ).ready(function() {


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


