<h4 style="text-align: center;">Sensación en boca</h4>
    <div class="mb-2 col-sm-14">
        <h5 >Cuerpo</h5>
        <span>
            Delgado
            <input type="range" id="rango1Sensacion" name="sensacionboca-cuerpo" min="0" max="13" list="lista-sensacionboca-cuerpo" value="0">
                <datalist id="lista-sensacionboca-cuerpo">
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
            Lleno
        </span>
    </div>
    <div class="mb-2 col-sm-14">
        <h5 >Carbonatación</h5>
        <span>
            Bajo
            <input type="range" id="rango2Sensacion" name="sensacionboca-carbonatacion" min="0" max="13" list="lista-sensacionboca-carbonatacion" value="0">
                <datalist id="lista-sensacionboca-carbonatacion">
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
        <h5 >Calentamiento</h5>
        <span>
            Bajo
            <input type="range" id="rango3Sensacion" name="sensacionboca-calentamiento" min="0" max="13" list="lista-sensacionboca-calentamiento" value="0">
                <datalist id="lista-sensacionboca-calentamiento">
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
        <h5 >Cremosidad</h5>
        <span>
            Bajo
            <input type="range" id="rango4Sensacion" name="sensacionboca-cremosidad" min="0" max="13" list="lista-sensacionboca-cremosidad" value="0">
                <datalist id="lista-sensacionboca-cremosidad">
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
        <h5 >Astringencia</h5>
        <span>
            Bajo
            <input type="range" id="rango5Sensacion" name="sensacionboca-astringencia" min="0" max="13" list="lista-sensacionboca-astringencia" value="0">
                <datalist id="lista-sensacionboca-astringencia">
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
        <input type="text" id="sensacionDes" name="sensacionboca-descripcion" placeholder="Descripción" required>
        <p id="texto4">0/200 palabras</p>
    </div>
    <div class="mb-2 col-sm-14">
        <label>Nota Min: 0 Max: 5</label>
        <input type="number" id="sensacionNota" onkeyup="this.value = MinMaxNumber(this, this.value)" min="0" max="5"   name="sensacion" placeholder="Nota" required>
    </div>

    <div class="botones">
        <button class="ba atras3"><i class="bi bi-arrow-left"></i>&nbsp&nbsp Anterior</button>
        <button type="button" id="b4" class="bs siguiente4" disabled>Siguiente &nbsp&nbsp<i class="bi bi-arrow-right"></i></button>
    </div>
                               