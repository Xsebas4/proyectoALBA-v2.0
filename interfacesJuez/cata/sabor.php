<h4 style="text-align: center;">Sabor</h4>
    <div class="mb-2 col-sm-14">
        <h5>Malta</h5>
        <span>
            Bajo
            <input type="range" id="rango1Sabor" name="sabor-malta" min="0" max="13" list="lista-sabor-malta" value="0">
                <datalist id="lista-sabor-malta">
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
        <h5 >Lúpulos</h5>
        <span>
            Bajo
            <input type="range" id="rango2Sabor"  name="sabor-lupulos" min="0" max="13" list="lista-sabor-lupulos" value="0">
                <datalist id="lista-sabor-lupulos">
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
        <h5 >Amargor</h5>
        <span>
            Bajo
            <input type="range" id="rango3Sabor"  name="sabor-amargor" min="0" max="13" list="lista-sabor-amargor" value="0">
                <datalist id="lista-sabor-amargor">
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
        <h5 >Fermentación</h5>
        <span>
            Bajo
            <input type="range" id="rango4Sabor"  name="sabor-fermentacion" min="0" max="13" list="lista-sabor-fermentacion" value="0">
                <datalist id="lista-sabor-fermentacion">
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
        <h5 >Equilibrio</h5>
        <span>
            Bajo
            <input type="range" id="rango5Sabor"  name="sabor-equilibrio" min="0" max="13" list="lista-sabor-equilibrio" value="0">
                <datalist id="lista-sabor-equilibrio">
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
        <h5>Final/Retrogusto</h5>
        <span>
            Bajo
            <input type="range" id="rango6Sabor"  name="sabor-retrogusto" min="0" max="13" list="lista-sabor-retrogusto" value="0">
                <datalist id="lista-sabor-retrogusto">
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
        <input type="text" id="saborDes" name="sabor-descripcion" placeholder="Descripción" required>
        <p id="texto3">0/200 palabras</p>
    </div>
    <div class="mb-2 col-sm-14">
        <label>Nota Min: 0 Max: 20</label>
        <input type="number" id="saborNota" onkeyup="this.value = MinMaxNumber(this, this.value)" min="0" max="20"   name="sabor" placeholder="Nota" required>
    </div>

    <div class="botones">
        <button class="ba atras2"><i class="bi bi-arrow-left"></i>&nbsp&nbsp Anterior</button>
        <button type="button" id="b3" class="bs siguiente3" disabled>Siguiente &nbsp&nbsp<i class="bi bi-arrow-right"></i></button>
    </div>
                    