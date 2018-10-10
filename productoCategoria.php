<h2 class="text-center p-3"><?php echo $_GET['descripcion'] ?></h2>
    <div class="row justify-content-around">
        <?php
            $categoria = $_GET['categoria'];
            $consulta="Select * from productos where id_categoria = $categoria";
            $res=$mysqli->query($consulta);
            while($rows=$res->fetch_assoc()){
                $ref_producto = $rows['ref_producto'];
                $descripcion = explode(".",$rows['descripcion']);
                echo '
             <div class="col-12 col-sm-4 col-md-3  m-3 producto text-center ">
                <a href="#" target="_blank" class=" text-dark">
                    <img src="img/novedad.png" alt="Novedad" style="position:absolute" width="30%">
                    <img class="imagenProducto img-fluid" src="'.$GLOBALS['ruta'].$rows['imagen'].'" alt="">
                    <div class="nombreProducto">
                        <p>'.$rows['nombre'].'</p>
                    </div>
                    <p class="precio">'.$rows['precio'].'€</p>
                </a>
                <button class="btn btn-info d-sm-none m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                <button class="btn btn-info btn-cesta m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                <button  class="btn-cesta btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalCenter'.$rows['ref_producto'].'">
                Ver detalles
                 </button>
            </div>
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter'.$rows['ref_producto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">'.$rows['nombre'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="row justify-content-around align-items-center">
                                            <img class="img-fluid col-6 modalImg" src="'.$GLOBALS['ruta'].$rows['imagen'].'" alt="">
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


                                            echo'                                   
                                                </select>
                                            
                                            </div>

                                        </div>
                                    <div class="text-center">
                                        <p class="modalPrecio ">'.$rows['precio'].'€</p>
                                        <button class="btn btn-info  m-3">Añadir a la cesta  <i class="fas fa-shopping-cart "></i></button>
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                                       
            }

            //INSERT INTO `productos` (`ref_producto`, `nombre`, `marca`, `descripcion`, `imagen`, `precio`, `id_descuento`, `id_categoria`) VALUES ('2', 'F3 Wasps (Origami', 'Flying Eagle', 'F3 Wasps (Origami', 'img/Patines/Freeskate/F3_origami_02-570x613.jpg', '159.90', '0', '4');
        ?>

    </div>