<?php
    if(empty($_SESSION['id_usuario'])){
      echo'
        <div class="alert alert-danger text-center mt-4" role="alert">
           Debes iniciar sesión para acceder a tu cuenta.
      
            <p>
                ¿No tienes cuenta??
            </p>
            <p>
                <a class="btn btn-primary mt-4"  href="index.php?registro=true#" role="button">Registrate!</a>
            </p>
        </div>';
        
    }
    else{

            
        ?>

        <h2 class="text-center p-3">Mi datos personales</h4>
        <hr class="barraMenu">
        <p class="text-muted text-center p-2">Revisa todos tus datos personales. Puedes actualizar tu dirección de email para recibir nuestros avisos,  cambiar tu número de telefono o renovar tu contraseña.</p>

        <?php 
            $usuario=$_SESSION['id_usuario'];

            if(isset($_POST['nombre'])){
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $dni = $_POST["dni"];
                $telefono = $_POST["telefono"];
                $email = $_POST["email"];
                $contraseñaActual=$_POST['contraseñaActual'];
                $contraseña = $_POST["contraseñaNueva"];
                $contraseña2 = $_POST["contraseñaConfirmacion"];

                $validarDNI=true;
                $validarEmail=true;
                $validarContraseña = true;
                $error="";
                $mysqli->query("Select dni from clientes where dni like '$dni'");
                $dniEnc=$mysqli->affected_rows;
                if($dniEnc > 1){
                    $validarDNI = false;
                    $error="DNI";

                }
                $mysqli->query("Select email from clientes where email like '$email'");
                $emailEnc=$mysqli->affected_rows;
                if($emailEnc > 1){
                    $validarEmail = false;
                    $error="Email";
                }
                $res=$mysqli->query("Select password from clientes where id_usuario like '$usuario'");
                $rows=$res->fetch_assoc();
                if($rows['password'] != $contraseñaActual){
                    $validarContraseña=false;
                    $error="contraseña";
                }
                else{
                    if(isset($_POST['contraseñaNueva'])){
                        
                        if($contraseña != $contraseña2){
                            $validarContraseña=false;
                            $error="contraseña. No coincide la nueva contraseña introducida con su confirmación";
                        }
                        else{
                            $contraseñaActual=$contraseña;
                        }
                    }
                }
                
                if($validarDNI == true && $validarEmail == true && $validarContraseña==true){
                $consulta="Update clientes set nombre ='$nombre', apellidos ='$apellidos',dni = '$dni', telefono ='$telefono', password='$contraseñaActual', email='$email' where id_usuario = $usuario";
                    $mysqli->query($consulta);
                    $cont = $mysqli->affected_rows;
                    if($cont <=0){
                        $error =" el registro";
                    }
                    else{
                        echo '
                    <div class="alert alert-success text-center mt-4" role="alert">
                    Datos actualizados correctamente!!
                        
                    </div>';
                    }
                }
                else{
                echo '
                    <div class="alert alert-danger text-center mt-4" role="alert">
                    Error en '.$error.'.
                        <p>
                            
                            <a class="btn btn-primary mt-4" href="index.php" role="button">Volver a intentarlo</a>
                        </p>
                    </div>';
                }
                
            }

            
            $consulta="Select * from clientes where id_usuario like '$usuario'";
            $res = $mysqli->query($consulta);
            $cont = $mysqli->affected_rows;
            $rows = $res->fetch_assoc();
            

            echo '
            <div class="card m-5">
        
                <div class="card-body">
                    <form class="row justify-content-center align-items-end" action="index.php?cuenta=true&datos=1" method="POST">
                        <div class="col-12 col-sm-6">
                            <label>* Nombre: </label><input type="text" class="form-control m-1 " name="nombre" value="'.$rows['nombre'].'" requrired>
                            <label>* Apellidos: </label><input type="text" class="form-control m-1 " name="apellidos" value="'.$rows['apellidos'].'" requrired>
                            <label>* Teléfono: </label><input type="number" class="form-control m-1 " name="telefono" value="'.$rows['telefono'].'" requrired>
                            <label>* E-mail: </label><input type="text" class="form-control m-1 " name="email" value="'.$rows['email'].'"requrired>
                            <label>* DNI: </label><input type="text" class="form-control m-1 " name="dni" value="'.$rows['dni'].'"  min="10" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))"  maxlength="10" requrired>
                            <label>* Contraseña actual: </label><input type="password" class="form-control m-1"  name="contraseñaActual" value="'.$rows['password'].'" requrired>
                            <label>Nueva contraseña: </label><input type="password" class="form-control m-1 " name="contraseñaNueva" minlength="8" placeholder="Mínimo 8 caracteres">
                            <label>Repita la nueva contraseña: </label><input type="password" class="form-control m-1 " name="contraseñaConfirmacion" minlength="8" placeholder="Mínimo 8 caracteres">
                            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                        
                    </form>
                </div>
            </div>';
                


        }


?>