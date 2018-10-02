<?php
    if(empty($_SESSION['id_usuario'])){
      echo'
        <div class="alert alert-danger text-center mt-4" role="alert">
           Debes iniciar sesión para acceder a tu cuenta.
      
            <p>
                ¿No tienes cuenta?
            </p>
            <p>
                <a class="btn btn-primary mt-4"  href="index.php?registro=true#" role="button">Registrate!</a>
            </p>
        </div>';
        
    }
    else{

            
        ?>


        <h2 class="text-center p-3">Mi direcciones</h4>
        <hr class="barraMenu">
        <p class="text-muted text-center p-2">Estas son tus direcciones de envio. Puedes actualizarlas o  agregar nuevas para tenerlas listas en tus próximas compras.</p>

        <?php 
            $usuario = $_SESSION["id_usuario"];
            $consulta="Select * from direcciones where id_usuario like '$usuario'";
            $res = $mysqli->query($consulta);
            $cont = $mysqli->affected_rows;

            if($cont == 0){
                echo '
                <div class="alert alert-danger text-center mt-4" role="alert">
                        No hay direcciones registradas!!!
                    
                </div>';
            }
            else{
                    
                while($rows = $res->fetch_assoc()){
                    $consulta = "Select municipio, provincia_id from municipios where id like ".$rows['id_localidad'];
                    $res2 = $mysqli->query($consulta);
                    $rows2 = $res2->fetch_assoc();

                    $consulta = "Select provincia from provincias where id like ".$rows2['provincia_id'];
                    $res3 = $mysqli->query($consulta);
                    $rows3 = $res3->fetch_assoc();

                    echo '
                    <div class="card m-5">
                    <h5 class="card-header text-center mayus" style=" text-transform: uppercase">'.$rows['descripcion'].'</h5>
                    <div class="card-body">
                        <div class="row justify-content-center align-items-end">
                            <div class="col-12 col-sm-8">
                                <p class="card-text "><span class="font-weight-light">Dirección</span>: '.$rows['calle'].'</p>
                                <p class="card-text"><span class="font-weight-light">Portal: </span>'.$rows['portal'].'</p>
                                <p class="card-text"><span class="font-weight-light">Piso: </span>'.$rows['piso'].'</p>
                                <p class="card-text"><span class="font-weight-light">Puerta: </span>'.$rows['puerta'].'</p>
                                
                                <p class="card-text"><span class="font-weight-light">Municipio: </span>'.$rows2['municipio'].'</p>
                                <p class="card-text"><span class="font-weight-light">Código Postal: </span>'.$rows['cp'].'</p>
                                <p class="card-text"><span class="font-weight-light">Provincia: </span>'.$rows3['provincia'].'</p>
                                <p class="card-text"><span class="font-weight-light">Comentarios: </span>'.$rows['comentarios'].'</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center">
                                <a href="#" class="btn btn-primary ">Actualizar</a>
                                
                                <a href="#" class="btn btn-primary">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>';
                }

            }

        }
        ?>