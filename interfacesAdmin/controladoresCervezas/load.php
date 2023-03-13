<?php

require "../../config/conexion.php";

$dat=$conexion->query("SELECT * FROM evento ORDER BY Id_evento DESC LIMIT 0,1");
$alt=$dat->fetch_object();
$evento=$alt->Id_evento;

$columns=['Codigo', 'Usuario', 'Estilo','Categoria','Adiciones'];

$campo= isset($_POST['buscador']) ? $conexion->real_escape_string($_POST['buscador']) : null;


$where='';
if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i=0; $i < $cont; $i++) { 
        $where.= $columns[$i] . " LIKE '%". $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .=")";
}


$sql="SELECT cerveza.Id_cerveza, cerveza.Codigo, cerveza.Muestras, cerveza.Adiciones, usuarios.Nombre AS Usuario, estilos.Nombre AS Estilo, categorias.Nombre AS Categoria
FROM cerveza
INNER JOIN usuarios ON cerveza.fk_usuario=usuarios.Id_usuario
INNER JOIN estilos ON estilos.Id_estilo=cerveza.fk_estilo
INNER JOIN categorias ON categorias.Id_categoria=estilos.fk_categoria AND estilos.Id_estilo = cerveza.fk_estilo
INNER JOIN evento_usuarios ON usuarios.Id_usuario=evento_usuarios.fk_usuarios
$where AND usuarios.Rol!=1";

$resultado=$conexion->query($sql);
$num_rows = $resultado->num_rows;

$html='';

if ($num_rows>0) {
    while ($row=$resultado->mysqli_fetch_assoc()) {
        $html.='<tr>';
            $html.='<!-- <td>'.$row['Id_cerveza'].'</td> -->';
            $html.='<td>'.$row['Codigo'].'</td>';
            $html.='<td>'.$row['Usuario'].'</td>';
            $html.='<td>'.$row['Categoria'].'</td>';
            $html.='<td>'.$row['Estilo'].'</td>';
            $html.='<td>'.$row['Adiciones'].'</td>';
            $html.='<td>'.$row['Muestras'].'</td>';
            $html.='<td><a href="modificarCervezas/modificarCervezas.php?Id_cerveza='.$row['Id_cerveza'].'"class="btn btn-small btn-warning"><i class="bi bi-pencil"></i></a></td>';
            $html.='<td><a onclick="return eliminar()" href="editarCervezas.php?Id_cerveza=<?=$datos->Id_cerveza?>"class="btn btn-small btn-danger"><i class="bi bi-trash"></i></a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td colspan="9">Sin resultados</td>';
    $html.='</tr>';
}

echo json_encode($html,JSON_UNESCAPED_UNICODE);

?>