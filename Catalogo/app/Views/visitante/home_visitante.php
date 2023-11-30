<!-- Recuerda agregar la validacion de sesion,
si no hay sesion iniciada no se debe poder acceder a
esta pagina -->

<?php
        //Si no hay una sesión iniciada entonces se redirijira al login
        $session =  \Config\Services::session();

        if($session->get('logged_in') == FALSE){
            return redirect('usuarios/login','refresh');
        }
?>

<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col">
            <?php
            echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Catálogo de productos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';

            // Mostrar los catálogos disponibles en una tabla
            foreach ($catalogos as $catalogo) {
                echo '<tr>';
                echo '<td>' . $catalogo['nombre_usuario'] . '</td>';
                echo '<td>' . $catalogo['nombre_catalogo'] . '</td>';
                echo '<td>
                <form action="'.base_url('/visitante/MostrarCatalogo').'" method="post">
                <input type="hidden" name="nombre_catalogo" value="' . $catalogo['nombre_catalogo'] . '">
                <button type="submit" class="btn btn-success">Consultar</button>
                </form>
                      </td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
            ?>
        </div>
    </div>
</div>