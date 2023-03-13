<?php
if (!empty($_POST['btnbos'])) {
    if (!empty($_POST['evento'])) {

        include "../../config/conexion.php";

        /* evento */
        $eve=$_POST['evento'];


        /* Medallaje */
        $sql3=$conexion->query("SELECT general.Id, general.fk_cerveza,general.fk_usuario,general.Ejemplo,general.Sin_fallas,general.Maravilloso,general.Nota,general.Aroma,general.Apariencia,general.Sabor,general.Sensacion, general.fk_evento 
        FROM general 
        WHERE Juzgado=1 AND fk_evento=$eve");

        while($datos = $sql3->fetch_object()){

            
            /* Suma para el puntaje total */
            $aroma=$datos->Aroma;
            $apariencia=$datos->Apariencia;
            $sabor=$datos->Sabor;
            $sensacion=$datos->Sensacion;
            $nota=$datos->Nota;

            $total=$aroma+$apariencia+$sabor+$sensacion+$nota;

            if($total>=34 && $total<37){
            $sql=$conexion->query("UPDATE cerveza SET Medalla= 'Bronce' WHERE Id_cerveza=$datos->fk_cerveza");
            
            }elseif ($total>=37 && $total<40) {
            $sql=$conexion->query("UPDATE cerveza SET Medalla = 'Plata' WHERE Id_cerveza=$datos->fk_cerveza");
            
            }elseif ($total>=40) {
            $sql=$conexion->query("UPDATE cerveza SET Medalla = 'Oro' WHERE Id_cerveza=$datos->fk_cerveza");
            
            }
        }

        /* cervezas ~Oro~ */
        $sql2=$conexion->query("SELECT cerveza.Id_cerveza,  categorias.Nombre AS Categoria, estilos.Nombre AS Estilo
        FROM cerveza
        INNER JOIN general ON general.fk_cerveza = cerveza.Id_cerveza
        INNER JOIN estilos ON estilos.Id_estilo = cerveza.fk_estilo
        INNER JOIN categorias ON categorias.Id_categoria = estilos.fk_categoria        
        WHERE general.fk_cerveza=cerveza.Id_cerveza AND general.Juzgado=1 AND cerveza.Medalla='Oro'");
        
        /* para obtener los jueces seleccionados */
        $sql1=$conexion->query("SELECT usuarios.Id_usuario, usuarios.Nombre, rango_juez.Nombre AS Rango
        FROM evento_usuarios 
        INNER JOIN evento ON evento_usuarios.fk_evento = evento.Id_evento
        INNER JOIN usuarios ON evento_usuarios.fk_usuarios=usuarios.Id_usuario
        INNER JOIN rango_juez ON usuarios.fk_rango_juez=rango_juez.Id_rango_juez
        WHERE usuarios.Rol=2 AND evento.Id_evento=$eve AND usuarios.Seleccionado=1");        
        $n = mysqli_num_rows($sql1);

        while ($ver=$sql2->fetch_object()){

            $cerv=$ver->Id_cerveza;

            for ($i=0; $i < $n; $i++) {

                if ($_POST['cata'.$i] !== 0) {
    
                    $cata=$_POST['cata'.$i];
                        
                }
                if ($cata!=0) {
                    $sql=$conexion->query("INSERT INTO best (Id,fk_cerveza,fk_usuario,Ejemplo,Sin_fallas,Maravilloso,Nota,Aroma,Apariencia,Sabor,Sensacion,Juzgado,fk_evento)
                    VALUES ('','$cerv','$cata','','','','','','','','',0,$eve)");
                }
                
                
            }           
        }
        /* inclusion del html */
        header ("location:../../statsbos/index.php");
    }
}
?>
<!-- aqui deberia ir las estadisticas de best of show -->