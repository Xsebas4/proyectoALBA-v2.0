<h4 style="text-align: center;">General</h4>
    <span>
        No adecuado al estilo
        <input type="range" id="rango1General" name="general-estilo" min="0" max="13" list="lista-general-estilo" value="0">
            <datalist id="lista-general-estilo">
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
        Ejemplo clásico
    </span>

    <div class="mb-2 col-sm-14">
    
        <span>
            Defectos significativos
            <input type="range" id="rango2General" name="general-fallas" min="0" max="13" list="lista-general-fallas" value="0">
                <datalist id="lista-general-fallas">
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
            Sin fallas
        </span>
    </div>
    <div class="mb-2 col-sm-14">
        
        <span>
            Sin vida
            <input type="range" id="rango3General" name="general-vida" min="0" max="13" list="lista-general-vida" value="0">
                <datalist id="lista-general-vida">
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
            Maravilloso
        </span>
    </div>



    <div class="mb-2 col-sm-14">
        <input type="text" id="generalFallas" name="fallas" placeholder="Fallas" required> 
    </div>
    <div class="mb-2 col-sm-14">
        <label>Minimo 100 palabras</label>
        <input type="text" id="generalDes" name="descripcion" placeholder="Descripción" required>
        <p id="wordCount">0/200 palabras</p>
    </div>
    <div class="mb-2 col-sm-14">
        <label>Nota Min: 0 Max: 10</label>
        <input type="number" id="generalNota" onkeyup="this.value = MinMaxNumber(this, this.value)" min="0" max="10" name="nota" placeholder="Nota" require>
    </div>

    <div class="botones">
        <button class="ba atras5"><i class="bi bi-arrow-left"></i>&nbsp&nbsp Anterior</button>
        <button id="b6" class="bs" type="submit" name="btnjuzgar" value="ok" onclick=reestablecer() disabled>Registrar</button>
    </div>

    <!--  <div class="boton">
        
    </div> -->