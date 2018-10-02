<h2 class="text-center p-3">Productos</h2>
    <div class="row justify-content-around">
        <?php
            $consulta="Select * from productos where id_categoria = 4";
            $res=$mysqli->query($consulta);
            while($rows=$res->fetch_assoc()){
                echo '
             <div class="col-12 col-sm-4 col-md-3  m-3 producto text-center ">
                <a href="#" target="_blank" class=" text-dark">
                    <img src="img/novedad.png" alt="Novedad" style="position:absolute" width="30%">
                    <img class="imagenProducto img-fluid" src="'.$rows['imagen'].'" alt="">
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
        <div class="col-12 col-sm-4 col-md-3  m-3 producto text-center ">
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





        <!--Collapse-->
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


    </div>