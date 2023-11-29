<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogos Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Catálogos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#conocenos">Conocenos</a>
        </li>
      </ul>
      <form class="d-flex" role="search">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('usuarios/registro'); ?>">Registrarse</a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.happy-desserts.com%2Fwp-content%2Fuploads%2F2021%2F04%2Flila2.jpg&f=1&nofb=1&ipt=9c7dc349d2828d06393aef408a696644d81adad4e041e39c0a25d43e23e78a56&ipo=images" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.happy-desserts.com%2Fwp-content%2Fuploads%2F2021%2F04%2Flila2.jpg&f=1&nofb=1&ipt=9c7dc349d2828d06393aef408a696644d81adad4e041e39c0a25d43e23e78a56&ipo=images" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.happy-desserts.com%2Fwp-content%2Fuploads%2F2021%2F04%2Flila2.jpg&f=1&nofb=1&ipt=9c7dc349d2828d06393aef408a696644d81adad4e041e39c0a25d43e23e78a56&ipo=images" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<h4 id="conocenos">¿Quienes somos?</h4>
<p>Crea tu catalogo personalizado para darte a conocer al mundo</p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>