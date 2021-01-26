<?php
$rol = isset($_SESSION['user_rol']) ? $_SESSION['user_rol'] : null;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?=HOST?>"><?=APP_NAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=_isActive('inicio')?>" aria-current="page" href="<?=HOST?>inicio">Inicio</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Gestión de usuarios</a></li>
            <li><a class="dropdown-item" href="#">CRUD simple</a></li>
            <li><a class="dropdown-item" href="#">CRUD con archivos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=_isActive('acerca')?>" aria-current="page" href="<?=HOST?>acerca">Acerca de</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <?php if($rol==null): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=HOST?>login">Iniciar sesión</a>
          </li>
        <?php endif; ?>
        <?php if($rol!=null): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=HOST?>logout">Cerrar sesión</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>