
<?php include("CONEXION.PHP");
session_start();
$GLOBALS['ruta'] = 'img/'; 
?>
<!-- Header -->
<?php include("header.php")?>
<body>
    <!--Cabecera-->

    <?php include("cabecera.php")?>

    <!--***************************************************-->

    <div class="container-fluid ">
       <div class="row justify-content-between ">
        <!--***************************************************-->
        <!-- Aside Izquierdo -->

            <div id="asideIzquierdo" class="col-12 col-sm-6 col-md-2  ">
            
                    <!--Menú navegacion-->
                    <?php include("menu.php")?>

                    <!-- Más vendidos -->
                    <?php include("masVendidos.php")?>

                    <!-- Opiniones-->
                    <?php include("opiniones.php")?>
                
            </div>

        <!--***************************************************-->
        <!--Main -->

            <div id="contenido" class="col-12  col-sm-12 col-md-8 " >
               
                
               <!--Carrusel-->
               <!--Productos-->
                <?php

                    
                    if(isset($_GET["salir"])){
                        
                        session_destroy();
                           
                         include("salir.php");
                    }
                    else if(isset($_GET["categoria"])){
                            include("carrusel.php");
                            include("productoCategoria.php");
                            
                        
                    }
                    else if(isset($_GET["registro"])){
                        include("registro.php");
                    }
                   
                    else if(isset($_GET["restaurarContrasena"])){
                        include("restaurarContrasena.php");
                    }
                    else if(isset($_GET["cuenta"])){
                        include("miCuenta.php");
                    }
                    else{

                            include("carrusel.php");
                            
                            include("main.php");
                    }
                        
                    
                ?>
                
            </div>

        <!--***************************************************-->
        <!--Aside Derecho-->
            <div class="col-12 col-sm-6 col-md-2 p-3 bg-light ">
                <!-- Cesta-->
                <?php include("cesta.php")?>

                <!-- Login -->
                <?php include("login.php")?>


                <!-- Ofertas Limitadas -->
                <?php include("ofertasLimitadas.php")?>

                <a href="#cabecera" style="position: sticky; top:90%; right: 10px; z-index: 1; color: black"><i class="fas fa-chevron-circle-up"  style="font-size: 30px; color: black"></i>Top</a>
                
                <!-- Ultima compra -->
                <?php include("ultimaCompra.php")?>
    
            </div>

    </div>

  
    <!--***************************************************-->
    <!--FOOTER-->
    <?php include("footer.php")?>

    
</body>

</html>