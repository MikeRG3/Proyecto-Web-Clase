<?php 

$ref_producto = $_GET['producto'];
$consulta = "Select * from productos where ref_producto = $ref_producto";
$res=$mysqli->query($consulta);
$rows=$res->fetch_assoc();
$descripcion = explode(". ",$rows['descripcion']);
echo '
<h2 class="text-center p-3">'.$rows["nombre"].'</h2>

    <div class="row justify-content-around align-items-center">
        <img class="imagenProducto img-fluid col-6" src="'.$GLOBALS['ruta'].$rows['imagen'].'" alt="">
        <div class="col-4">
            <p class="precioProducto m-3">'.$rows["precio"].'€</p>
            <select class="custom-select m-3">
                <option selected>Selecciona la talla</option>';

                
                    $consulta = "Select * from stock where ref_producto = $ref_producto";
                    $res2 = $mysqli->query($consulta);
                    while($rows2=$res2->fetch_assoc()){
                        $class = "";
                        if($rows2['stock']==0){
                            $class = disabled;
                        }
                    
                    echo '  <option '.$class.' "value="'.$rows2['talla'].'">Talla '.$rows2['talla'].' ('.$rows2['stock'].' uds)</option>';
                    }

            
            echo'                                     
            </select>
            <p class="m-3">Cantidad</p>
            <input class="form-control m-3" type="number" value="0">
            <button class="btn btn-info  m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>

    </div> 
    <h4 class="text-center p-3">Descripción</h4>
    <div class="text-justify p-5">';
        foreach($descripcion as $p){
            echo '<p>'.$p.'</p>';
        }
    echo '</div>';

?>