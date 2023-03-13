<?php
    if (!empty($_POST['codigo'])) {
        
        $cod=$_POST['codigo'];
        include "../../config/conexion.php";

        $sql=$conexion->query("SELECT * FROM cerveza WHERE Codigo='$cod'");
        $check=$sql->fetch_object();

        if ($check != null) {

            $Id_usuario=$_POST['usuario'];
            
            $sql="SELECT COUNT(Id) AS n FROM general WHERE fk_usuario=$Id_usuario AND Juzgado=0";
            $query = mysqli_query($conexion, $sql);

            if ($query!=null) {

                $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);  
                $res= $filas[0]['n'];
                
            }else{
                echo "<div class='noCervezas'; >NO TIENES CERVEZAS POR JUZGAR</div>";
                
            }

        if ($res!=0) {
        
            $sql=$conexion->query("SELECT Id, Juzgado,
            (SELECT Nombre FROM usuarios WHERE Id_usuario=general.fk_usuario AND Id_usuario=$Id_usuario) AS Usuario, 
            categorias.Nombre AS Categoria,estilos.Id_estilo, estilos.Nombre AS Estilo, cerveza.Codigo, general.Mesa
            FROM general 
            INNER JOIN cerveza ON general.fk_cerveza=cerveza.Id_cerveza
            INNER JOIN estilos ON cerveza.fk_estilo=estilos.Id_estilo
            INNER JOIN categorias ON estilos.fk_categoria=categorias.Id_categoria
            INNER JOIN usuarios ON cerveza.fk_usuario=usuarios.Id_usuario
            WHERE general.Juzgado=0 and cerveza.Codigo='$cod'
            LIMIT 0,1");
            $next=$sql->fetch_object(); 
            
            if ($next!=null) {
                ?>
                
                <html>
                <head>
                
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Cata</title>

                    <link rel="stylesheet" href="../../css/juzgamiento3.css">
                    <link rel="icon" href="../../img/Logo.png">
                    <!-- llamada de iconos -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
                    <!-- JavaScript Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
                    <!-- jquery  -->
                    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
                    <!-- boostrap -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                
                </head>
                    <!-- div para el boton de regresar -->
                    <div id="icon" class="regresar">
                    
                    </div>


                    <div class="container">
                        
                    <div class="textos">

                        <div class="titulo" style="color:white;">
                            <h4>Calificación</h4>
                            <h4 >Registro juzgamiento</h4>
                            <h4>Mesa <?=$next->Mesa?></h4>  
                        </div>

                                        
                        <h2>Código:</h2>
                        <input type="text" value="<?=$next->Codigo?>" readonly onmousedown="return false;">


                        <h2>Categoría:</h2>
                        <input type="text" value="<?=$next->Categoria?>" readonly onmousedown="return false;">
                        <br>


                        <div class="txtEstilos">
                        <?php  include('../espanol.php'); ?>	
                            <button class="botonEstilos" type="button"  data-toggle="modal" data-target="#estiloS">
                                <?=$next->Estilo?> - ES
                            </button>
                            

                            <button class="botonEstilos" type="button"  data-toggle="modal" data-target="#estiloN">
                                <?=$next->Estilo?> - EN
                            </button>
                            <?php  include('../ingles.php'); ?>
                            
                        </div>
                        <br>


                    </div>


                    <div class="grande" id="principio">
                        <!-- formulario para rellenar la tabla de la basae de datos -->
                        <form id="formul" method="POST">


                            <div class="form movPag">
                            
                                <div class="aroma">

                                    <?php include "../cata/aroma.php";?>    

                                </div>
                                <!-- --------------------------------------------------------------------- -->
                                
                                <div class="apariencia">
                                
                                    <?php include "../cata/apariencia.php";?>

                                </div>
                                <!-- -------------------------------------------------------------------------------------------- -->
                                <div class="sabor">
                                
                                    <?php include "../cata/sabor.php"?>    

                                </div>
                                <!-- ---------------------------------------------------------- -->
                                <div class="sensacion">
                                
                                    <?php include "../cata/sensacion.php";?>
                                    
                                </div>

                                <!-- ---------------------------------------------------- -->
                                <div class="fallas">
                                    
                                    <?php include "../cata/fallas.php";?>

                                </div>
                                <!-- -------------------------------------------------------------------------- -->
                                
                                <!-- -------------------------------------------------------------------------- -->
                                <div class="general">
                                    
                                    <?php include "../cata/general.php";?>

                                </div>

                            </div>

                        </form>

                    </div>

                    
                </div>

                    <?php
                        }else{
                            ?>
                            <link rel="stylesheet" href="../../css/juzgamiento3.css">
                            <link rel="icon" href="../../img/Logo.png">
                            <title>Cata</title>
                            <div class="noResultados">
                                <h1>No se encontraron resultados</h1>
                                <button type="button" onclick="history.back()">
                                    Ingresar código
                                </button>
                            </div>
                            <?php
                        }
                    } else{
                        echo "<div class='noCervezas';>NO TIENES MÁS CERVEZAS POR JUZGAR</div>";
                        /* header("location:resultados.php"); */
                    }
                ?>
                


                <!-- division de la pantalla hacia la izquierda -->

                <!-- ------------------------------------------------------------------------ -->
                
                <!-- llamado de archivo js para que se pueda ver la aminacion de siguiente y anterior en el formulario -->
                <script src="../../js/moverFormulario.js"></script>

                <!-- llamado del archivo js para que se pueda lar la condicion del max y el min en la Nota -->
                <script src="../../js/MinMaxNumber.js"></script>
                


                <!-- modal info -->
                <!-- jquery -->
                <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

                <script src="../js/bootstrap.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function() {

                        $(window).on('load',function() {
                            $(".cargando").fadeOut(1000);
                        });

                });
                </script>


                <!-- script para el boton de regresar en esta interfaz -->
                <script>

                // Obtener el elemento div
                var icon = document.getElementById("icon");

                // Función para actualizar el icono según el ancho de la pantalla
                function updateIcon() {
                var screenWidth = window.innerWidth;
                if (screenWidth <= 760) {
                    icon.innerHTML = "<a href='../juzgamiento.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i></button></a>";
                } else {
                    icon.innerHTML = "<a href='../juzgamiento.php'><button name='regresar'><i class='bi bi-arrow-90deg-left'></i> Regresar</button></a>"
                }
                }

                // Ejecutar la función al cargar la página
                updateIcon();

                // Ejecutar la función cada vez que cambia el tamaño de la pantalla
                window.addEventListener("resize", function() {
                updateIcon();
                });

                </script>

                <!-- para subor el formulario al dar click en los botones de siguiente y atras -->
                <script src="../../js/subirFormulario.js"></script>

                <!-- para el limite de 100 palabras y habilitar y deshabilitar los botones -->
                <script src="../../js/limite100CataBotones.js"></script>

                <?php
                    }else {
                        ?>
                        <link rel="stylesheet" href="../../css/juzgamiento3.css">
                        <link rel="icon" href="../../img/Logo.png">
                        <title>Cata</title>
                        <div class="noResultados">
                            <h1>No se encontraron resultados</h1>
                            <button type="button" onclick="history.back()">
                                Ingresar código
                            </button>
                        </div>

                        <?php
                    }
                }
            ?>
            </body>
            </html>