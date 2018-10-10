<h2 class="text-center p-3">Alta de nuevo Producto</h4>
<hr class="barraMenu">
<form name="altaProducto" action="#" method="POST">

    <div class="row justify-content-center">
        <div class="col-12 col-sm-5">
            <h4 class="text-center p-3">Producto a agregar</h4>
            <hr class="hr-red">
            <label for="my-input">Nombre Producto</label>
            <input id="my-input " class="form-control " type="text" name="nombre" required>
            <label for="my-input ">Marca</label>
            <input id="my-input " class="form-control " type="text " name="marca" required>
            <label for="my-input ">Descripción</label>
            <input id="my-input " class="form-control " type="text " name="descripcion" required>
            <label for="my-input ">Precio</label>
            <input id="my-input " class="form-control " type="number " name="precio" required>
            <label for="my-input ">Fecha de salida</label>
            <input id="my-input " class="form-control " type="mail " name="fecha"  placeholder="YYYY/mm/dd">
            <label for="my-input ">Descuento</label>
            <select class="custom-select" name="descuento">
            
            <option  value="NULL">Sin descuento </option> '
            <?php 
                $consulta = "Select * from descuentos";
                $res = $mysqli->query($consulta);
                while($rows=$res->fetch_assoc()){
                  
                echo '  <option  value="'.$rows['id_descuento'].'">'.$rows['porcentaje'].'% </option> ';
                }

            ?>
                                                
            </select>
            <label for="my-input ">Categoria</label>
            <select class="custom-select" name="categoria">
             
            <?php 
                $consulta = "Select * from categorias where id_padre is NOT NULL";
                $res = $mysqli->query($consulta);
                while($rows=$res->fetch_assoc()){
                   
                
                echo '  <option value="'.$rows['id_categoria'].'">'.$rows['descripcion'].' </option> ';
                }

            ?>
                                                
            </select>
            <button type="submit" class="btn btn-info mt-5 ">Enviar</button>
        </div>
        
    </div>
</form>

<?php
if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $fecha = date("Y/m/d");
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];

    $consulta= "INSERT INTO productos (`ref_producto`, `nombre`, `marca`, `descripcion`, `precio`, `fecha_salida`, `id_descuento`, `id_categoria`)
     VALUES (NULL, '$nombre', '$marca', '$descripcion', $precio, '$fecha', $descuento, $categoria)";
     echo $consulta;
     $res=$mysqli->query($consulta);
     $cont=$mysqli->affected_rows;

     echo "Contadooor". $cont;

}

?>