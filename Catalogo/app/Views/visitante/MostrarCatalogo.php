<div class="container-xxl">
    <div class="row justify-content-start">
        <div class="col">
<div class="accordion accordion-flush" id="Catalogo">
<?php
foreach($productos as $producto){
  //Elimina los espacios de los nombres para ponerlos en los id de las etiquetas
  $nombre_producto = str_replace(' ', '', $producto['nombre_producto']);
  echo '<div class="container">
  <div class="row">
  <div class ="col">
  <div class="accordion-item">
  <h2 class="accordion-header">
  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-'.
  $nombre_producto.'" aria-expanded="true" aria-controls="flush-'.$nombre_producto.'">'.$producto['nombre_producto'].'</button>
  </h2>
  <div id="flush-'.$nombre_producto.'"'.' class="accordion-collapse collapse" data-bs-parent="#Catalogo"> 
  <div class="accordion-body">
  <strong>Descripción</strong>
  <div class="card" style="width: 18rem;">
  <img src="imagenes\Pastel de moras.png" class="card-img-top" alt="Not Found">
  <div class="card-body">
  <p class="card-text">'.$producto['descripcion'].'</p>
</div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <div class ="col align-self-center">
  <table class="table">
  <tr>
      <td>Categoria: '.$producto['nombre_categoria'].' </td>
  </tr>
  <tr>
      <td>Vendedor: '.$producto['nombre_usuario'].' </td>
  </tr>
  <tr>
      <td>Contacto: </td>
      <td>Telefono: '.$producto['telefono'].' </td>
      <td>Mail: '.$producto['correo_electronico'].' </td>
  </tr>
  <tr>
  <td>Precio:$'.$producto['precio'].' </td>
  <td>Stock: '.$producto['stock'].' </td>
</tr>
</table>
  </div>

  <div class ="col align-self-center">
  <table class="table">
  <tr>
      <td>Comentar: </td>
  </tr>
  <tr>
      <td>
      <div class="input-group">
      <textarea class="form-control" aria-label="With textarea"></textarea>
      </div>
      </td>
  </tr>
  <tr>
      <td>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary">Enviar</button>
      </div>
      </td>
  </tr>
</table>
  </div>
  <div class="row" >

  <table class="table">
  <tr>
      <td>
<div class="form-floating mb-3">
<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 100px" disabled>';

//Si el producto actual coincide con el de los comentarios lo imprimimos
foreach($comentarios as $comentario){
    if($comentario['nombre_producto'] == $producto['nombre_producto']){
        echo $comentario['nombre_usuario'].": ".$comentario['comentario']."\n";
    }
}

echo '</textarea>
<label for="floatingTextarea2Disabled">Comentarios</label>
</div>

</td>
<tr>
<td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button type="button" class="btn btn-outline-primary"> < </button>
<button type="button" class="btn btn-outline-primary"> > </button>
</div>
</td>

</tr>
  </tr>
</table>

  </div>
  </div>
  </div>';
}
?>
        </div>
    </div> <!-- Fin de la primer columna-->
        <div class ="col-2">
            Texto
        </div><!-- Fin de la segunda columna-->
</div><!-- Fin del acordeon-->

</div>