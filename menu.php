

<nav id="menus" class="navbar navbar-expand-md ">

    <div class="bg-light">
        <h2 class="collapse navbar-collapse p-3">Menú</h2>
        <hr class="barraMenu">
        <button class="navbar-toggler float-left" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class=""><i class="far fa-plus-square"></i>Menú</span>
        </button>


        <div class="collapse navbar-collapse p-3 " id="menu">
            <ul class="nav flex-column">
                <?php
                    $consulta = "Select descripcion from categorias where id_padre is NULL";
                    $res = $mysqli->query($consulta);

                    while($rows=$res->fetch_assoc()){
                        echo ' 
                                <li class="nav-item">
                                <a class="nav-link active enlacesMenu" data-toggle="collapse" href="#'.$rows['descripcion'].'"> <i class="far fa-plus-square"></i> '.$rows['descripcion'].'</a>
                                <ul class="collapse  flex-column" id="'.$rows['descripcion'].'">';
                    
                        $consulta = "Select descripcion from categorias where id_padre in(Select id_categoria from categorias where descripcion like '".$rows['descripcion']."')";
                        $res2 = $mysqli->query($consulta);
                        while($rows2=$res2->fetch_assoc()){
                            echo '
                            <li><a href="index.php?'.$rows2['descripcion'].'=true">'.$rows2['descripcion'].'</a></li>
                                
                            ';
                        }
                        echo '</ul>';
                    }
            
                ?>

                <hr class="barraMenu">
                <li class="nav-item">
                    <a class="nav-link active enlacesMenu" data-toggle="collapse" href="#micuenta"> <i class="far fa-plus-square"></i> Mi cuenta</a>
                    <ul class="collapse  flex-column" id="micuenta">
                        <li><a  href="index.php?cuenta=true&compras=1">Mis compras</a></li>
                        <li><a  href="index.php?cuenta=true&datos=1">Mis datos</a></li>
                        <li><a  href="index.php?cuenta=true&direcciones=1">Mis direcciones</a></li>

                    </ul>
                </li>
            </ul>
                

        </div>
    </div>
</nav>