

<div id="opinion" class="carousel slide d-none d-sm-block bg-light mt-4" data-ride="carousel">

    <h2 class=" p-4 ">Opiniones</h2>
    <hr class="barraMenu">

    <div class="carousel-inner text-center">
    <?php 
        $consulta = "Select * from opiniones";
        $res = $mysqli->query($consulta);
        $i=0;
        while($rows=$res->fetch_assoc()){
            $i++;
            $id_usuario = $rows['id_usuario'];
            $comentario = $rows['comentarios'];
            $titulo = $rows['titulo'];
            $estrellas = $rows['estrellas'];
            
            $consulta = "Select nombre, apellidos from clientes where id_usuario like '$id_usuario'";
            $res2 = $mysqli->query($consulta);
            $rows2 = $res2->fetch_assoc();
            $nombreUsuario = $rows2['nombre'];
            $apellidosUsuario =$rows2['apellidos'];

            $ref_producto = $rows['ref_producto'];
            $consulta = "Select * from productos where ref_producto like '$ref_producto'";
            $res3=$mysqli->query($consulta);
            $rows3=$res3->fetch_assoc();
            $imagen =$rows3['imagen'];
            if($i==1){
                $class = "active";
            }
            else{
                $class ="";
            }
            echo'
            <div class="carousel-item '.$class.' ">
            <img src="'.$GLOBALS['ruta'].$imagen.'" alt=" " class="ultimaCompra col-6 ">
                <div class="text-center ">
                    <div class="opiniones">

                        <p class="usuario">'.$nombreUsuario.' '.$apellidosUsuario.'</p>
                        <p class="opinionUsuario">'.$titulo.'</p>
                        <a class="col-12 float-right" data-toggle="collapse" href="#vermas" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <small>Ver comentario</small>
                         </a>
                         <p class="collapse " id="vermas">
                                '.$comentario.'
                         </p>
                    </div>
                    <p class="estrellas mt-2">';
                    $j=0;
                    while($j <5){
                        if($estrellas>=$j){
                            if($estrellas - $j == 0.5){
                               echo '<i class="fas fa-star-half-alt"></i>';
                            }
                            else{
                                echo '<i class="fas fa-star"></i>';
                            }
                        }
                        else {
                            echo '<i class="far fa-star"></i>';
                        }
                        $j++;
                    }
                   
                    echo '</p>
                    <br><br>
                </div>
             </div>
            
            ';

        }

     ?>
        
        

    </div>
    <a class="carousel-control-prev" href="#opinion" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#opinion" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

 </div>

