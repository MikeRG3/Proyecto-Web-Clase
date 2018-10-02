<?php
    if(empty($_POST["mail"])){

    
?>

<div class="jumbotron m-5  text-center">
                <h1 class="display-4 text-center">¿Olvidaste tu contraseña?</h1>
                <p class="lead">Introduce aquí tu email, y te enviaremos una nueva</p>
                <hr class="my-4 hr-black">
               
                <p class="lead text-center ">
                <form action="#" method="POST">
                    <label for="my-input ">E-mail</label>
                    <input id="my-input " class="form-control " type="mail " name="email" required>
                    <button type="submit" class="btn btn-info m-1">Enviar</button>
                </form>
                </p>
 </div>

 <?php
    }
    else{
        $mail=$_POST["mail"];
        $consulta="Select mail from clientes where mail like '$mail'";
        $mysqli->query($consulta);
        $cont=$mysqli->affected_rows;

        if($cont<=0){

            ?>
            
            <div class="alert alert-danger text-center mt-4" role="alert">
                     El email introducido no está registrado!
                     <a href="index.php?restaurarContraseña=true">¿Olvidaste tu contraseña?</a>
                    <a class="btn btn-primary mt-4" href="index.php" role="button">Volver a inicio</a>
            </div>
    <?php
        }

        else{

            $contraseña="";
            for ($i=0; $i <8; $i++) { 
               $contraseña .=rand(0,9);
            }

            $para      = $mail;
            $titulo    = 'Nueva contraseña';
            $mensaje   = 'Aquí tienes tu nueva contraseña'.$contraseña;
            $cabeceras = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);
        }
    }
 
 
 ?>