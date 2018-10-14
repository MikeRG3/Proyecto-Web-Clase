<?php 
if(!isset($_POST["nombre"])){

?>
<h2 class="text-center p-3">Alta de usuario</h4>
<hr class="barraMenu">
<form name="alta" action="#" method="POST">

    <div class="row justify-content-center">
        <div class="col-12 col-sm-5">
            <h4 class="text-center p-3">Datos personales</h4>
            <hr class="hr-red">
            <label for="my-input">Nombre</label>
            <input id="my-input " class="form-control " type="text" name="nombre" required>
            <label for="my-input ">Apellidos</label>
            <input id="my-input " class="form-control " type="text " name="apellidos" required>
            <label for="my-input ">DNI</label>
            <input id="my-input " class="form-control " type="text " name="dni" min="10" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))"  maxlength="10" required>
            <label for="my-input ">Teléfono</label>
            <input id="my-input " class="form-control " type="number " name="telefono" required>
            <label for="my-input ">E-mail</label>
            <input id="my-input " class="form-control " type="mail " name="email" required>
            <h4 class="text-center p-3">Contraseña</h4>
            <hr class="hr-red">
            <label for="my-input ">Contraseña</label>
            <input id="my-input " class="form-control " type="password" name="password" minlength="8" placeholder="Mínimo 8 caracteres" required>
            <label for="my-input ">Repita contraseña</label>
            <input id="my-input " class="form-control " type="password" name="password2" minlength="8" placeholder="Mínimo 8 caracteres" required>
            
        </div>
        <div class="col-12 col-sm-5">
            <h4 class="text-center p-3">Dirección</h4>
            <hr class="hr-red">
            <label for="my-input ">Dirección</label>
            <input id="my-input " class="form-control " type="text " name="direccion" required>
            <label for="my-input ">Portal</label>
            <input id="my-input " class="form-control " type="text " name="portal" required>
            <label for="my-input ">Piso</label>
            <input id="my-input " class="form-control " type="text " name="piso" required>
            <label for="my-input ">Puerta</label>
            <input id="my-input " class="form-control " type="text " name="puerta" required>
            <label for="my-input ">Provincia</label>
            <select class="custom-select" id="provincia" name="descuento" >
            <option  value="0">--Seleccione su provincia-- </option>
            
            <?php 
                $consulta = "Select * from provincias";
                $res = $mysqli->query($consulta);
                while($rows=$res->fetch_assoc()){
                  
                echo '  <option  value="'.$rows['id'].'">'.$rows['provincia'].' </option> ';
                }

            ?>                                               
            </select>
            <label for="my-input ">Localidad</label>
            <select class="custom-select" id="localidad" name="localidad" >
                <option  value="0">--Seleccione su municipio-- </option>
            </select>


            <label for="my-input ">Código Postal</label>
            <input id="my-input " class="form-control " type="number " name="codigo" >
            <label for="my-input ">Comentarios</label>
            <input id="my-input " class="form-control " type="number " name="comentarios" required>

            <label for="my-input ">Descripción de la dirección</label>
            <input id="my-input " class="form-control " type="text " placeholder=" Ej: Mi casa, Trabajo,..."  name="descripcion">
            <button type="submit" class="btn btn-info mt-5 ">Enviar</button>
        </div>
    </div>
</form>
<?php 
}
else{

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contraseña = $_POST["password"];
    $contraseña2 = $_POST["password2"];

    $direccion=$_POST["direccion"];
    $portal= $_POST["portal"];
    $piso= $_POST["piso"];
    $puerta= $_POST["puerta"];
    $comentarios= $_POST["comentarios"];
    $codigo=$_POST["codigo"];
    $descripcion=$_POST["descripcion"];
    

    if( $contraseña != $contraseña2){
        ?>
        <div class="jumbotron m-5  text-center"> 
                <h1 class="display-4 ">LAS CONTRASEÑAS NO COINCIDEN!</h1>
                <p class="lead">Inténtalo de nuevo y asegúrate de introducir la misma contraseña con al menos 8 caracteres!!</p>
                <hr class="my-4 hr-black">
               
                <p class="lead text-center">
                <a class="btn btn-primary" href="index.php?registro=true" role="button">Volver a inicio</a>
                </p>
            </div>
       
     <?php

        
    }
    else{
        $consulta="select Max(id_usuario) as max from usuarios";
        $res = $mysqli->query($consulta);
        $cont = $mysqli->affected_rows;
        if($cont<0){
            $id_usuario = 1;
        }
        else{

            $rows = $res->fetch_assoc();
            $id_usuario = $rows["max"] + 1;
        }
        
        $consulta="INSERT INTO USUARIOS VALUES($id_usuario)";
        $mysqli->query($consulta);
        

        $consulta ="INSERT INTO CLIENTES VALUES ($id_usuario,'$nombre', '$apellidos','$dni', $telefono,'$contraseña','$email',true)";
        $mysqli->query($consulta);
        $res1 = $mysqli->affected_rows;
        echo $consulta;
        $consulta = "SELECT MAX(id_direccion) as max from DIRECCIONES";
        $res= $mysqli->query($consulta);
        $rows = $res->fetch_assoc();
        $id_dir = $rows["max"] + 1;
        

              
       
        $consulta="INSERT INTO DIRECCIONES VALUES($id_dir,'$direccion','$portal','$piso','$puerta','$descripcion', $codigo,'$comentarios',1,$id_usuario)";
        echo $consulta;
        $mysqli->query($consulta);
        $res2 = $mysqli->affected_rows;

        if($res1<0 || $res2<0){
            ?>

           <div class="jumbotron m-5  text-center">
                <h1 class="display-4 text-center">ERROR EN EL REGISTRO!</h1>
                <p class="lead">Algo salió mal en el registro. Inténtalo de nuevo!!</p>
                <hr class="my-4 hr-black">
               
                <p class="lead text-center">
                <a class="btn btn-primary" href="index.php" role="button">Volver a inicio</a>
                </p>
            </div>
        <?php
        }
        else{
            ?>
           
            <div class="jumbotron m-5  text-center">
                <h1 class="display-4  text-center">REGISTRO EXITOSO!</h1>
                <p class="lead">El registro se ha completado con éxito. Ya puedes loguearte e iniciar tus compras!!</p>
                <hr class="my-4 hr-black">
               
                <p class="lead text-center">
                <a class="btn btn-primary" href="index.php" role="button">Volver a inicio</a>
                </p>
            </div>
           
        <?php
        }
       
    }

}
    



?>