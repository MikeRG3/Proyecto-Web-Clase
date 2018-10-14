<h2 class="text-center p-3">Alta de nuevo Producto</h4>
<hr class="barraMenu">

<form name="altaProducto" action="#" method="POST">
    <div class="row justify-content-center">
    <?php
            if(isset($_POST['nombre'])){
                $nombre = $_POST['nombre'];
                $marca = $_POST['marca'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $fecha = date("Y/m/d");
                $descuento = $_POST['descuento'];
                $categoria = $_POST['subCategoria'];

                $consulta= "INSERT INTO productos (`ref_producto`, `nombre`, `marca`, `descripcion`, `precio`, `fecha_salida`, `id_descuento`, `id_categoria`)
                VALUES (NULL, '$nombre', '$marca', '$descripcion', $precio, '$fecha', $descuento, $categoria)";
                
                $res=$mysqli->query($consulta);
                $cont=$mysqli->affected_rows;

                if($cont >=1){
                    echo'  <div class=" col-6 alert alert-success" role="alert">
                            Producto insertado correctamente!!
                            </div>';
                }
                else{
                    echo '<div class="col-6 alert alert-primary" role="alert">
                            Algo falló en el registro!!
                            </div>';
                }

            }

    ?>
    </div>
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
            
            <option  value="NULL">Sin descuento </option> 
            <?php 
                $consulta = "Select * from descuentos";
                $res = $mysqli->query($consulta);
                while($rows=$res->fetch_assoc()){
                  
                echo '  <option  value="'.$rows['id_descuento'].'">'.$rows['porcentaje'].'% </option> ';
                }

            ?>                                               
            </select>

            <label for="my-input ">Categoria Principal</label>
            <select class="custom-select" id="categoria" name="categoria">
            <option  value="NULL">--Seleccione categoria principal-- </option> '
                <?php 
                    $consulta = "Select * from categorias where id_padre is  NULL";
                    $res = $mysqli->query($consulta);
                    while($rows=$res->fetch_assoc()){
                    
                    
                    echo '  <option value="'.$rows['id_categoria'].'">'.$rows['descripcion'].' </option> ';
                    }

                ?>
            </select>

            <label for="my-input ">Sub-categoria</label>
            <select class="custom-select" id="subCategoria" name="subCategoria">
            <option  value="NULL">--Seleccione subcategoria-- </option> '
             </select>

        </div>
        <div class="col-12 col-sm-5">
            <h4 class="text-center p-3">Stock</h4>
            <hr class="hr-red">
            <div class="row justify-content-center">
            <?php
                $consulta = "Select talla from tallas";
                $res = $mysqli->query($consulta);
                while($rows=$res->fetch_assoc()){
                 echo'  <label class="col-6" for="my-input ">Talla '.$rows['talla'].'    --------------   </label>';
                  echo'  <input id="my-input " class="form-control col-6" type="text " name="'.$rows['talla'].'" value="0" placeolder="talla">';
                }
            ?>
            </div>
            <button type="submit" class="btn btn-info mt-5 ">Agregar Producto</button>
        </div>
        
    </div>
</form>

