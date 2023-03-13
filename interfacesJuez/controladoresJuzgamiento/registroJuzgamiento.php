<?php
/* comprobacion despues de rellenar el formulario */

if(!empty($_POST["btnjuzgar"])) {
    /* formulario segmentado */
    /* aroma */
    if (!empty($_POST["aroma"]) and !empty($_POST["apariencia"]) and !empty($_POST["sabor"]) and !empty($_POST["sensacion"]) and !empty($_POST["general-estilo"]) and !empty($_POST["general-fallas"]) and !empty($_POST["general-vida"]) and !empty($_POST["fallas"]) and !empty($_POST["descripcion"]) and !empty($_POST["nota"])) {
        
        /* Id del juzgamiento */
        $Id=$_POST["Id"];
        
        /* comentarios dirigidos a la tabla comentarios */
        $aroma_descripcion=$_POST['aroma-descripcion'];
        $apariencia_descripcion=$_POST['apariencia-descripcion'];
        $sabor_descripcion=$_POST['sabor-descripcion'];
        $sensacionboca_descripcion=$_POST['sensacionboca-descripcion'];
        $descripcion=$_POST["descripcion"];
        
        /* aroma */
        $sql=$conexion->query("INSERT INTO comentarios SET Id='', Comentario='$aroma_descripcion'");
        $sql=$conexion->query("SELECT * FROM comentarios ORDER BY Id DESC LIMIT 0,1");
        $dat=$sql->fecth_object();
        $sql=$conexion->query("INSERT INTO general_comentarios SET fk_general=$Id, fk_comentarios=$dat->Id");

        /* apariencia */
        $sql=$conexion->query("INSERT INTO comentarios SET Id='', Comentario='$apariencia_descripcion'");
        $sql=$conexion->query("SELECT * FROM comentarios ORDER BY Id DESC LIMIT 0,1");
        $dat=$sql->fecth_object();
        $sql=$conexion->query("INSERT INTO general_comentarios SET fk_general=$Id, fk_comentarios=$dat->Id");

        /* sabor */
        $sql=$conexion->query("INSERT INTO comentarios SET Id='', Comentario='$sabor_descripcion'");
        $sql=$conexion->query("SELECT * FROM comentarios ORDER BY Id DESC LIMIT 0,1");
        $dat=$sql->fecth_object();
        $sql=$conexion->query("INSERT INTO general_comentarios SET fk_general=$Id, fk_comentarios=$dat->Id");

        /* sensacion */
        $sql=$conexion->query("INSERT INTO comentarios SET Id='', Comentario='$sensacionboca_descripcion'");
        $sql=$conexion->query("SELECT * FROM comentarios ORDER BY Id DESC LIMIT 0,1");
        $dat=$sql->fecth_object();
        $sql=$conexion->query("INSERT INTO general_comentarios SET fk_general=$Id, fk_comentarios=$dat->Id");

        /* descripcion */
        $sql=$conexion->query("INSERT INTO comentarios SET Id='', Comentario='$descripcion'");
        $sql=$conexion->query("SELECT * FROM comentarios ORDER BY Id DESC LIMIT 0,1");
        $dat=$sql->fecth_object();
        $sql=$conexion->query("INSERT INTO general_comentarios SET fk_general=$Id, fk_comentarios=$dat->Id");

        /* para registrar fallas */
        $sql=$conexion->query("SELECT * FROM fallas");
        $n= $sql->num_rows;

        for ($a=1; $a < $n; $a++) {

            if ($_POST['nivel'.$a] != 0) {

                $falla=$_POST['nivel'.$a];
                $sql=$conexion->query("INSERT INTO general_fallas (fk_general, fk_fallas, Nivel) VALUES ($Id,$a, $falla)");

            }

        }
        
        
        $aroma=$_POST["aroma"];
        $apariencia=$_POST["apariencia"];
        $sabor=$_POST["sabor"];
        $sensacion=$_POST["sensacion"];

        $generalestilo=$_POST["general-estilo"];
        $generalfallas=$_POST["general-fallas"];
        $generalvida=$_POST["general-vida"];

        $nota=$_POST["nota"];

        /* hacemos la consulta para insertar en la tabla de la base de datos */
        $sql=$conexion->query(
            "UPDATE general 
            SET Ejemplo=$generalestilo,Sin_fallas=$generalfallas,Maravilloso=$generalvida,Nota=$nota,Aroma=$aroma,Apariencia=$apariencia,Sabor=$sabor,Sensacion=$sensacion, Juzgado=1
            WHERE Id=$Id AND Juzgado=0");
            
        /* validamos si se registro correctamente */
    
        if ($sql==1) {
            echo "<div style='color: white;
            padding: 0 0 20px 0;
            text-align: center;
            color: #fff;
            font-size: 20px;'> Juzgamiento registrado exitosamente </div>";
            /* header ("location: ../estadisticas/stats.php?Id=$Id"); */
            /* header ("location: proyectoALBA/interfacesJuez/juzgamiento.php"); */
            echo "<script type='text/javascript'>
                location.reload();
                    </script>";
            
        } else {
            echo "<div class='alert alert-danger'>Error 404 </div>";
        };

    }else {
        header("location: ../juzgamieno.php");

    };
}
?>