<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuariosController extends BaseController
{
    public function index()
    {
        return view('/commons/head') . view('/usuarios/registro') . view('/commons/footer');
    }

    public function log()
    {
        return view('/commons/head') . view('/usuarios/login') . view('/commons/footer');
    }

    public function registrar_usuario()
    {
        $db = \Config\Database::connect();

        $data = [
            "correo_electronico" => $_POST['correo_electronico'],
            "nombre_usuario" => $_POST['nombre_usuario'],
            "contrasena" => $_POST['contrasena'],
            "perfil" => $_POST['perfil']
        ];
        $db->table('visitante')->insert($data);
        return view('/commons/head'). view('/usuarios/login') . view('/commons/footer');
    }

    public function ingresar()
    {

        $validation = \Config\Services::validation();
        $session = \Config\Services::session();

        // Si el metodo es get
        if (strtolower($this->request->getMethod()) === 'get') {
            return view('/commons/head') .
                view('/usuarios/login') .
                view('/commons/footer');
        }

        // reglas
        $rules = [
            'correo_electronico' => 'required',
            'contrasena' => 'required',
            'perfil' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('/commons/head') .
                view('/usuarios/login') .
                view('/commons/footer');
        } else {
            //si pasa las reglas
            $correo_electronico = $_POST['correo_electronico'];
            $contrasena = $_POST['contrasena'];
            $perfil = $_POST['perfil'];

            //Segun el tipo de perfil buscaremos los datos requeridos
            switch ($perfil) {
                // Si es administrador buscamos en la tabla de administrador
                case 1:
                    $modelo = model('AdministradorModel');
                    $data['usuario'] = $modelo->like('correo_electronico', $correo_electronico)
                        ->like('contrasena', $contrasena)
                        ->findAll();

                    //iniciar sesion
                    if (count($data['usuario']) > 0) {
                        $session = session();
                        $newdata = [
                            'id_administrador' => $data['usuario'][0]->id_administrador,
                            'nombre_usuario' => $data['usuario'][0]->nombre_usuario,
                            'correo_electronico' => $data['usuario'][0]->correo_electronico,
                            'logged_in' => true,
                        ];
                        $session->set($newdata);
                        return view('/commons/head').view('/commons/menu').view('/vendedor/homeVendedor').view('/commons/footer');
                    } else {
                        return redirect('usuarios/login', 'refresh');
                    }
                    break;
                // Si es vendedor buscamos en la tabla de vendedor
                case 2:
                    $modelo = model('VendedorModel');
                    $data['usuario'] = $modelo->like('correo_electronico', $correo_electronico)
                        ->like('contrasena', $contrasena)
                        ->findAll();

                    //iniciar sesion
                    if (count($data['usuario']) > 0) {
                        $session = session();
                        $newdata = [
                            'id_vendedor' => $data['usuario'][0]->id_vendedor,
                            'nombre_usuario' => $data['usuario'][0]->nombre_usuario,
                            'correo_electronico' => $data['usuario'][0]->correo_electronico,
                            'logged_in' => true,
                        ];
                        $session->set($newdata);
                        return view('/commons/head') . view('/commons/menu') . view('/vendedor/homeVendedor') . view('/commons/footer');
                    } else {
                        return redirect('usuarios/login', 'refresh');
                    }
                    break;
                // Si es cliente buscamos en la tabla de visitante
                case 3:
                    $modelo = model('VisitanteModel');
                    $data['usuario'] = $modelo->like('correo_electronico', $correo_electronico)
                        ->like('contrasena', $contrasena)
                        ->findAll();

                    //iniciar sesion
                    if (count($data['usuario']) > 0) {
                        $session = session();
                        $newdata = [
                            'id_visitante' => $data['usuario'][0]->id_visitante,
                            'nombre_usuario' => $data['usuario'][0]->nombre_usuario,
                            'correo_electronico' => $data['usuario'][0]->correo_electronico,
                            'logged_in' => true,
                        ];
                        $session->set($newdata);
                        $visitante = new VisitanteController();
                        $visitante->mostrarCatalogos();
                        return view('/commons/head') . view('/commons/menu') . view('/visitante/home_visitante') . view('/commons/footer');
                    } else {
                        return redirect('usuarios/login', 'refresh');
                    }
                    break;

            }
        }
    }

    public function cerrar_sesion()
    {   
        $session = \Config\Services::session();
        if ($session->get('logged_in') == TRUE) {
            $session->destroy();
        }

        return redirect('usuarios/login','refresh');
    }
}
