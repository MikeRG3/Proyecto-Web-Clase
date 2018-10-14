<?php
include("../CONEXION.PHP"); 
if(isset($_POST['id_provincia'])){   
    $consulta = "Select id,municipio from municipios where provincia_id = ".$_POST['id_provincia']."";
    $res = $mysqli->query($consulta);
    while($rows=$res->fetch_assoc()){   
        echo '  <option  value="'.$rows['id'].'">'.$rows['municipio'].' </option> ';
    }
}else{
    echo ' <option  value="0">Error </option> '; 
}
?>

