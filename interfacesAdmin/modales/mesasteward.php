<!-- Modal -->
<div class="modal fade" id="aceptarN" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aceptarN" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background: rgba(65, 64, 59, 0.445);">
        <h1 class="modal-title fs-5" id="aceptarN" style="text-align: center; color:white;">Mesas</h1>
      </div>
      <div class="modal-body" style="background: rgba(65, 64, 59, 0.445); overflow: hidden;">
        <div>
            <h3 style="color:white">Asignanación de steward</h3>
            <form id="dar">
                
                <div class="selecModal">
                  <label>Steward</label>
                  <select name="steward" id="steward" class="form-control" >
                    <option value="" selected disabled> Seleccione steward </option>
                    <?php foreach ($filas as $op): ?>
                      <option value="<?= $op['Id_usuario']?>"><?=$op['Nombre']?></option>
                    <?php endforeach; ?>
                  </select> 
    
                </div>
                <div class="mesasSteward">
                  <label>Mesas</label>
                    <input type="number" name="mesasteward" id="mesasteward">
                </div>
                  
                <div class="botones2">

                  <div>
                    <button type="button" style="background: red;" data-bs-dismiss="modal">Cerrar</button>
                  </div>

                  <div>
                    <button type="submit" data-bs-toggle="modal" id="accionador">Siguiente</button>
                  </div>
                  
                </div>
                
                
            </form>
        </div>
      </div>
      
      
      
    </div>
  </div>
 
</div>
<script>
    $( document ).ready(function() {
        $("#accionador").click(function(){
            $("#oculto").click();
        });

      $("#dar").submit(function(event){
          event.preventDefault(); //previene el comportamiento por defecto del formulario
          var mesasteward = $("#mesasteward").val(); //obtiene el valor del select mesa
          var steward = $("#steward").val(); //obtiene el valor del input de stewards
          var dar = $('#stew');
          $.ajax({
                data: {mesasteward: mesasteward, steward:steward}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                dataType: 'html', //tipo de datos que esperamos de regreso
                type: 'POST', //mandar variables como post o get
                url: './controladoreJuzgamiento/steward.php' //url que recibe las variables
              }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
                
                dar.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                
              });
      });
    });
</script>
