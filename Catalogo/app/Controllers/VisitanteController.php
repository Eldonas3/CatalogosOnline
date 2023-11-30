<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VisitanteController extends BaseController
{

    // El usuario consultara el catalogo de un vendedor o producto
    public function consultarCatalogo(){

        //Si no hay una sesión iniciada entonces se redirijira al login
        $session = \Config\Services::session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('usuarios/login','refresh');
        }else{
            //si hay una sesión iniciada hace la consulta
            $db = \Config\Database::connect();

            // recibimos el catalogo que queremos buscar
            $nombre_catalogo = $_POST['nombre_catalogo'];
    
            //Este query busca toda la informacion rederente a los productos del catalogo
            $productos = $db->query('select p.nombre_producto,p.descripcion,p.precio,ct.nombre_categoria,v.nombre_usuario,v.telefono,v.correo_electronico,p.stock 
            from producto as p left join catalogo as c 
            on p.catalogo = c.id_catalogo left join categoria as ct
            on p.categoria = ct.id_categoria left join vendedor as v
            on c.vendedor = v.id_vendedor where c.nombre_catalogo ='.'"'.$nombre_catalogo.'"')->getResultArray();
    
            //Este query busca la información de los comentarios de los catalogos 
            $comentarios = $db->query('select v.nombre_usuario,p.nombre_producto, cm.comentario from producto as p left join comentario as cm
            on p.id_producto = cm.producto left join visitante as v
            on cm.visitante = v.id_visitante')->getResultArray();
    
            $data = ['productos'   => $productos,
                     'comentarios' => $comentarios];
            return view('commons/head').view('commons/menu').view('visitante/MostrarCatalogo',$data).view('commons/footer');
        }


    }

    //Envia todos los catalogos disponibles
    public function mostrarCatalogos(){
        $db = \Config\Database::connect();

        $catalogos = $db->query('select c.nombre_catalogo,v.nombre_usuario from catalogo as c left join vendedor as v
        on c.vendedor = v.id_vendedor')->getResultArray();
        $data = ['catalogos' => $catalogos];
        return view('commons/head').view('commons/menu').view('visitante/home_visitante',$data).view('commons/footer');
        // redirect('visitante/home_visitante',$data);
    }

}
