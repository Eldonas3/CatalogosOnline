<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
<form action="<?= base_url('/usuarios/registro') ?>" method="POST">
<?= csrf_field() ?>
  <div class="mb-3">
    <label for="correo_electronico" class="form-label">Correo electronico</label>
    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" aria-describedby="emailHelp" placeholder="correo electronico">
    <div id="emailHelp" class="form-text">No compartiremos tu información con nadie</div>
  </div>

  <div class="mb-3">
  <label for="nombre_usuario" class="form-label">Usuario</label>
  <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
  </div>

  <div class="mb-3">
  <label for="perfil" class="form-label">¿Eres cliente o vendedor?</label> 
  <select name="perfil" id="perfil" class="form-select" aria-label="Default select example">
    <option value="2">Vendedor</option>
    <option value="3">Cliente</option>
  </select>
  </div>

  <div class="mb-3">
    <label for="contrasena" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
  </div>
  
  <div class="d-grid gap-2 col-3 mx-auto">
  <button class="btn btn-primary" type="submit">Registrate</button>
</div>

</form>
        </div>
        <div class="col"></div>
    </div>
</div>