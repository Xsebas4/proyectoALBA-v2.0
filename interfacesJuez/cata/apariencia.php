<h4 style="text-align: center;">Apariencia</h4>
    <div class="mb-2 col-sm-14">
            <div class="mb-2 col-sm-14">
                <input type="text" id="aparienciaIns" name="apariencia-inspeccion" placeholder="Inspección de botella" required>
            </div>
            <h5>Color</h5>
            <span>
                Amarillo
                <input type="range" id="rango1Apariencia" name="apariencia-color" min="0" max="13" list="lista-apariencia-color" value="0">
                    <datalist id="lista-apariencia-color">
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
                Negro
            </span>
    </div>
        <div class="mb-2 col-sm-14">
        <h5 >Claridad</h5>
            <span>
                Brillante
                <input type="range" id="rango2Apariencia" name="apariencia-claridad" min="0" max="13" list="lista-apariencia-claridad" value="0">
                    <datalist id="lista-apariencia-claridad">
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
                Opaco
            </span>
        </div>
        <div class="mb-2 col-sm-14">
            <h5 >Espuma</h5>
            <div class="mb-2 col-sm-14">
                <h6>Color</h6>
                <span>
                    Blanco
                    <input type="range" id="rango3Apariencia" name="espuma-color" min="0" max="13" list="lista-espuma-color" value="0">
                        <datalist id="lista-espuma-color">
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
                    Marron
                </span>
            </div>
        </div>
        
            <div class="mb-2 col-sm-14">
                <h6 >Formación de espuma</h6>
                <span>
                    Bajo
                    <input type="range" id="rango4Apariencia" name="espuma-formacion" min="0" max="13" list="lista-espuma-formacion" value="0">
                        <datalist id="lista-espuma-formacion">
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
                <h6 >Retención</h6>
                <span>
                    Rápido
                    <input type="range" id="rango5Apariencia" name="espuma-retencion" min="0" max="13" list="lista-espuma-retencion" value="0">
                        <datalist id="lista-espuma-retencion">
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
                    Persistente
                </span>
            
        </div>
        
        <div class="mb-2 col-sm-14">
            <label>Minimo 100 palabras</label>
            <input type="text" id="aparienciaDes" name="apariencia-descripcion" placeholder="Descripción" required>
            <p id="texto2">0/200 palabras</p>
        </div>
        <div class="mb-2 col-sm-14">
            <label>Nota Min: 0 Max: 3</label>
            <input type="number" id="aparienciaNota" onkeyup="this.value = MinMaxNumber(this, this.value)" min="0" max="3"  name="apariencia" placeholder="Nota" required>
        </div>

        <div class="botones">
            <button class="ba atras1"><i class="bi bi-arrow-left"></i>&nbsp&nbsp Anterior</button>
            <button type="button" id="b2" class="bs siguiente2" disabled>Siguiente &nbsp&nbsp<i class="bi bi-arrow-right"></i></button>
        </div>