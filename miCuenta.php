<?php
  if(isset($_GET["compras"])){
    include("historialCompras.php");
  }
  else if (isset($_GET["direcciones"])){
  include("misdirecciones.php");
  }
  else if(isset($_GET["datos"])){
    include("misdatos.php");
  }
  else{
?>

<h2 class="text-center p-3">Mi cuenta</h4>
<hr class="barraMenu">
<p class="text-muted text-center p-2">Bienvenido a tu cuenta. Aquí podrás gestionar tus pedidos y tu información personal</p>
<div class="text-center m-2 row justify-content-around">
<div class="card col-12 col-sm-3 m-3">
    <i class="fas fa-shopping-cart  logoGrande "></i>
    <div class="card-body">
      <h5 class="card-title">Mi historial de compras</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      
      <a role="button" href="index.php?cuenta=true&compras=1" class="btn btn-outline-primary btn-lg">Compras</a>
    </div>
  </div>
  <div class="card col-12 col-sm-3 m-3">
  <i class="fas fa-clipboard-list logoGrande "></i>
    <div class="card-body">
      <h5 class="card-title">Mis direcciones</h5>
      <br>
      <p class="card-text">Direcciones establecidas para el envio. Aquí podrás actualizarlas, agregar nuevas o eliminar las antiguas</p>
      <a role="button" href="index.php?cuenta=true&direcciones=1" class="btn btn-outline-primary btn-lg">Direcciones</a>
    </div>
  </div>
  <div class="card col-12 col-sm-3 m-3">
    <i class="fas fa-user logoGrande"></i>
    <div class="card-body">
      <h5 class="card-title">Mi información personal</h5>
      <p class="card-text">Puedes actualizar tu dirección de email para recibir nuestros avisos,  cambiar tu número de telefono o renovar tu contraseña.</p>
      <a role="button" href="index.php?cuenta=true&datos=1" class="btn btn-outline-primary btn-lg">Info</a>
    </div>
  </div>
  <div class="card col-12 col-sm-3 m-3">
    <i class="fas fa-shopping-cart logoGrande"></i>
    <div class="card-body">
      <h5 class="card-title">Mi información personal</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <a role="button" href="#" class="btn btn-outline-primary btn-lg">Compras</a>
    </div>
  </div>
  
</div>

<?php
}

?>