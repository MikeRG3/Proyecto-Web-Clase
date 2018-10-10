<div class="row justify-content-around">
<?php
    $consulta="Select id_padre, descripcion from categorias where id_padre IS NULL";
    $res=$mysqli->query($consulta);
    while($rows=$res->fetch_assoc()){
        
            echo' <h2 class="text-center col-12 p-3">'.$rows['descripcion'].'</h2>';
?>



   
        <?php
        
            $consulta="Select * from productos where id_categoria in(select id_categoria from categorias where id_padre in(select id_categoria from categorias where descripcion like '".$rows['descripcion']."')) limit 9";
           
            $res1=$mysqli->query($consulta);
            while($rows1=$res1->fetch_assoc()){
                $ref_producto = $rows1['ref_producto'];
                $descripcion = explode(".",$rows1['descripcion']);
                echo '
             <div class="col-12 col-sm-4 col-md-3  m-3 producto text-center ">
                <a href="index.php?producto='.$ref_producto.'" target="_blank" class=" text-dark">
                 
                    <img src="img/novedad.png" alt="Novedad" style="position:absolute" width="30%">
                    <img class="imagenProducto img-fluid" src="'.$GLOBALS['ruta'].$rows1['imagen'].'" alt="">
                    <div class="nombreProducto">
                        <p>'.$rows1['nombre'].'</p>
                    </div>
                    <p class="precio">'.$rows1['precio'].'€</p>
                </a>
                <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                <button  class="btn-cesta btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalCenter'.$rows1['ref_producto'].'">
                    Ver detalles
                </button>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter'.$rows1['ref_producto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">'.$rows1['nombre'].'</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="row justify-content-around align-items-center">
                                        <img class="img-fluid col-6 modalImg" src="'.$GLOBALS['ruta'].$rows1['imagen'].'" alt="">
                                        <div class="col-6">
                                            <p class="text-justify modalDescrip">'.$descripcion[0].'</p>
                                            <select class="custom-select">
                                            <option selected>Selecciona la talla</option>
                                            ';
                                                $consulta = "Select * from stock where ref_producto = $ref_producto";
                                                $res2 = $mysqli->query($consulta);
                                                while($rows2=$res2->fetch_assoc()){
                                                    $class = "";
                                                    if($rows2['stock']==0){
                                                        $class = disabled;
                                                    }
                                                
                                                echo '  <option '.$class.' "value="'.$rows2['talla'].'">Talla '.$rows2['talla'].' ('.$rows2['stock'].' uds)</option> ';
                                                }


                                            echo '                                    
                                            </select>
                                        </div>

                                    </div>
                                <div class="text-center">
                                    <p class="modalPrecio ">'.$rows1['precio'].'€</p>
                                    <button class="btn btn-info  m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                                </div>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            ';
            }
        }
      
            //INSERT INTO `productos` (`ref_producto`, `nombre`, `marca`, `descripcion`, `imagen`, `precio`, `id_descuento`, `id_categoria`) VALUES ('2', 'F3 Wasps (Origami', 'Flying Eagle', 'F3 Wasps (Origami', 'img/Patines/Freeskate/F3_origami_02-570x613.jpg', '159.90', '0', '4');
        ?>
          </div>
 <!--       <div class="col-12 col-sm-4 col-md-3  m-3 producto text-center ">
            <a href="#" target="_blank" class=" text-dark">
                <img src="img/novedad.png" alt="Novedad" style="position:absolute" width="30%">
                <img class="imagenProducto img-fluid" src="img/patin.jpg" alt="">
                <div class="nombreProducto">
                    <p>Powerslide "NEXT" Supercruiser 110mm Negros</p>
                </div>
                <p class="precio">299,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
        <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
            <a href="#" target="_blank" class=" text-dark">

                <img class="imagenProducto img-fluid" src="img/patin4.jpg" alt="">
                <div class="nombreProducto">
                    <p>Powerslide "NEXT" Megacruiser 125mm</p>
                </div>
                <p class="precio">279,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
        <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
            <a href="#" target="_blank" class=" text-dark">
                <img class="imagenProducto img-fluid" src="img/patin5.jpg" alt="">
                <div class="nombreProducto">
                    <p>F6S Racing Green</p>
                </div>
                <p class="precio">299,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
        <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
            <a href="#" target="_blank" class=" text-dark">
                <img class="imagenProducto img-fluid" src="img/patin2.png" alt="">
                <p>F7110 Red 7</p>
                <p class="precio">229,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
        <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
            <a href="#" target="_blank" class=" text-dark">
                <img src="img/oferta3.png" alt="" style="position:absolute;margin-left: 50%" width="30%">
                <img class="imagenProducto img-fluid" src="img/patin3.jpg" alt="">
                <p>F3 Wasps (Origami)</p>
                <del class="float-left pl-5">299,99€</del>
                <p class="precio float-right pr-5">199,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
        <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
            <a href="#" target="_blank" class=" text-dark">
                <img class="imagenProducto img-fluid" src="img/patin.jpg" alt="">
                <p>Powerslide "NEXT" Supercruiser 110mm Negros</p>
                <p class="precio">299,99€</p>
            </a>
            <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            <button class="btn btn-info btn-cesta m-3 m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
        </div>
   




        <!--Collapse
        <a class="col-12 float-right" data-toggle="collapse" href="#vermas" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver más...
            </a>


        <div class="collapse row justify-content-around" id="vermas">
            <div class="col-12 col-sm-4 col-md-3  m-3  producto text-center">
                <img src="img/patin.jpg" alt="" style="width: 90%; height: 200px;">
                <p>Powerslide "NEXT" Supercruiser 110mm Negros</p>
                <p>299,99€</p>
                <button class="btn btn-info">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            </div>
            <div class="col-12 col-sm-4  col-md-3 m-3  producto text-center">
                <img src="img/patin.jpg" alt="" style="width: 90%; height: 200px;">
                <p>Powerslide "NEXT" Supercruiser 110mm Negros</p>
                <p>299,99€</p>
                <button class="btn btn-info">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            </div>
            <div class="col-12 col-sm-4  col-md-3 m-3 producto text-center">
                <img src="img/patin.jpg" alt="" style="width: 90%; height: 200px;">
                <p>Powerslide "NEXT" Supercruiser 110mm Negros</p>
                <p>299,99€</p>
                <button class="btn btn-info">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
            </div>
        </div>


    -->