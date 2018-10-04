<h2 class="text-center p-3"><?php echo $_GET['descripcion'] ?></h2>
    <div class="row justify-content-around">
        <?php
            $categoria = $_GET['categoria'];
            $consulta="Select * from productos where id_categoria = $categoria";
            $res=$mysqli->query($consulta);
            while($rows=$res->fetch_assoc()){
               
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
            </div>';
            }

            //INSERT INTO `productos` (`ref_producto`, `nombre`, `marca`, `descripcion`, `imagen`, `precio`, `id_descuento`, `id_categoria`) VALUES ('2', 'F3 Wasps (Origami', 'Flying Eagle', 'F3 Wasps (Origami', 'img/Patines/Freeskate/F3_origami_02-570x613.jpg', '159.90', '0', '4');
        ?>

    </div>