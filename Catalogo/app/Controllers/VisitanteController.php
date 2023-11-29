<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VisitanteController extends BaseController
{

    public function index(){
        
    }

    // El usuario consultara el catalogo de un vendedor o producto
    public function consultarCatalogo(){

        $db = \Config\Database::connect();
        $productos = $db->query('select p.nombre_producto,p.descripcion,p.precio,ct.nombre_categoria,v.nombre_usuario,v.telefono,v.correo_electronico,p.stock 
        from producto as p left join catalogo as c 
        on p.catalogo = c.id_catalogo left join categoria as ct
        on p.categoria = ct.id_categoria left join vendedor as v
        on c.vendedor = v.id_vendedor where c.nombre_catalogo ='.'"Electrodomesticos Pinguino"')->getResultArray();

        $comentarios = $db->query('select v.nombre_usuario,p.nombre_producto, cm.comentario from producto as p left join comentario as cm
        on p.id_producto = cm.producto left join visitante as v
        on cm.visitante = v.id_visitante')->getResultArray();

        $data = ['productos'   => $productos,
                 'comentarios' => $comentarios];
        return view('commons/head').view('commons/menu').view('visitante/MostrarCatalogo',$data).view('commons/footer');
    }

    public function mostrarCatalogo(){

    }
}
