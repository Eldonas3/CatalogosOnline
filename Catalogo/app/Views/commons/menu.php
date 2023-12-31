<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Catálogos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inicio
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('index.php/alumno/agregar'); ?>">Agregar</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/alumno/mostrar'); ?>">Mostrar</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/alumno/buscar'); ?>">Buscar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form action="<?= base_url('/usuarios/cerrar_sesion') ?>" method = "GET" class="d-flex" role="search">
        <button class="btn btn-outline-danger" type="submit">Cerrar</button>
      </form>
    </div>
  </div>
</nav>