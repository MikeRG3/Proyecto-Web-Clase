<?php
include("../CONEXION.PHP"); 
if(isset($_POST['id_padre'])){   
    $consulta = "Select id_categoria, descripcion from categorias where id_padre = ".$_POST['id_padre']."";
    $res = $mysqli->query($consulta);
    while($rows=$res->fetch_assoc()){   
        echo '  <option  value="'.$rows['id_categoria'].'">'.$rows['descripcion'].' </option> ';
    }
}else{
    echo ' <option  value="0">Error </option> '; 
}
?>
