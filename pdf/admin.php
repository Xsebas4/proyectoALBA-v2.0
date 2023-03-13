<?php

include '../config/conexion.php';
require "vendor/autoload.php";
$sql=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
    $x=$sql->fetch_object();
    $count=$x->Mesas;

        $steward = $_POST['steward'];
        $mesas = $_POST['mesas'];
        
        $sql=$conexion->query("SELECT * FROM usuarios WHERE Id_usuario=$steward");
        $dat=$sql->fetch_object();
        
        $html = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Asignación de steward mesas ".$dat->Nombre." ".$dat->Apellido."</title>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap' rel='stylesheet'>
            <link rel='icon' href='../img/Logo.png'>
            
            <style>
                *{
                    font-family: 'Open Sans', 'sans-serif';
                }

                h1{
                    text-align: center;
                }

                table{
                    border: 1px solid black;
                }

                table thead{
                    background: #39A900;
                    color: white;
                    font-size: 22px;
                }

                table td{
                    text-align: center;
                    padding: 30px;
                    border: 1px solid black;
                }

                h1{
                    text-align: letf;
                    margin-bottom: 30px;
                }
                
                  
            </style>
            
        </head>
        <body>
        <div class='container'>
            <div class='column'>
            <h1>".$dat->Nombre." ".$dat->Apellido."</h1>
            <table>
            <thead>
                <tr>
                    <td >Código</td>
                    <td >Estilo</td>
                    <td >Juez</td>
                    <td>Mesa</td>
                </tr>
            </thead>  
        <tbody>
        ";
        for ($a=1; $a <= $mesas; $a++) { 
            $mesita=$_POST['mesast'.$a];
                   
            $sql = $conexion->query("SELECT general.Id,general.fk_usuario, (SELECT Nombre FROM usuarios WHERE Id_usuario=general.fk_usuario) AS Usuario, 
            categorias.Nombre AS Categoria, estilos.Nombre AS Estilo, cerveza.Codigo, general.Mesa
            FROM evento_usuarios
            INNER JOIN usuarios ON evento_usuarios.fk_usuarios=usuarios.Id_usuario
            INNER JOIN cerveza ON cerveza.fk_usuario=usuarios.Id_usuario
            INNER JOIN general ON general.fk_cerveza= cerveza.Id_cerveza
            INNER JOIN estilos ON estilos.Id_estilo=cerveza.fk_estilo
            INNER JOIN categorias ON categorias.Id_categoria=estilos.fk_categoria
            WHERE general.Mesa=$mesita");
            
            
            while($datos=$sql->fetch_object()){
                $html.="
                        <tr>
                            <td >".$datos->Codigo."</td> 
                            <!-- <td>".$datos->Id."</td>-->
                            <td >".$datos->Categoria." - ".$datos->Estilo."</td>
                            <td>".$datos->Usuario."</td>
                            <td>".$mesita."</td>
                        </tr>
                        ";
            
            }
        }
        $html.="</tbody>
        </table>
            </div>
        </div>
        </body>
        </html>
        ";

    



use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("documento.pdf",array('Attachment'=>'0'));
    
?>