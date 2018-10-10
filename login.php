<?php
    if(empty($_POST['usuario']) && empty($_SESSION['id_usuario']) )
    {

    
?>
<form action="" method="POST">

    <div class="form-group p-3 text-center">
  
                    <label for="my-input" >Usuario</label>
                    <input id="my-input " class="form-control " type="text " name="usuario" placeholder="E-mail">
                    <label for="my-input ">Contraseña</label>
                    <input id="my-input " class="form-control " type="password" name="contraseña" placeholder="******">
                    <button class="btn btn-info m-2" type="submit">Entrar</button>
                    <a href="index.php?registro=true#" class="">Registrarse</a>
    </div>
</form>

<?php
    }
    else{
        if(empty($_SESSION['id_usuario'])){

            
            $usuario=$_POST['usuario'];
            $contraseña=$_POST['contraseña'];

            $consulta = "Select nombre,id_usuario,admin from clientes where email like '$usuario' and password like '$contraseña'";
            $res =$mysqli->query($consulta);
            $cont=$mysqli->affected_rows;
            $rows = $res->fetch_assoc();
            $nombre = $rows['nombre'];
            $id_usuario = $rows['id_usuario'];
            $admin = $rows['admin'];

            if($cont<=0){
                ?>
                <div class="alert alert-danger text-center mt-4" role="alert">
                     Usuario o contraseñas incorrectos!!!
                     <p>
                     <a href="index.php?restaurarContrasena=true">¿Olvidaste tu contraseña?</a>
                    <a class="btn btn-primary mt-4" href="index.php" role="button">Volver a intentarlo</a>
                    </p>
                </div>
                <?php
        
            } else{
                $_SESSION['nombre']=$nombre;
                $_SESSION['id_usuario']=$id_usuario;
                $_SESSION['admin']=$admin;
               
                echo '
                <div class="alert alert-light text-center" role="alert">
                    BIENVENIDO '.$_SESSION['nombre'].'!!!';
                    if($admin == 1){
                        echo ' <a class="btn btn-danger mt-4" href="index.php?altaProducto=true" role="button">Alta de producto</a>';
                    }
                    echo' <p>
                    <a class="btn btn-primary mt-4" href="index.php?cuenta=true" role="button">Mi cuenta</a>

                    <a class="btn btn-primary mt-4" href="index.php?salir=true" role="button">Salir</a>
                    </p>
                </div>';
               
            }
        }
        
         else{   
            
            echo '
            <div class="alert alert-light text-center" role="alert">
                BIENVENIDO '.$_SESSION['nombre'].'!!!
                <p>';
                if($_SESSION['admin'] == 1){
                    echo ' <a class="btn btn-danger mt-4" href="index.php?altaProducto=true" role="button">Alta de producto</a>';
                }
                echo'
                <a class="btn btn-primary mt-4" href="index.php?cuenta=true" role="button">Mi cuenta</a>

                <a class="btn btn-primary mt-4" href="index.php?salir=true" role="button">Salir</a>
                </p>
            </div>';
            
        }

        

    }
?>