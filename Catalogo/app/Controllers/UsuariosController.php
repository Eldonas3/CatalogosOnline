<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuariosController extends BaseController
{
    public function index()
    {
        return view('/commons/head').view('/usuarios/registro').view('/commons/footer');
    }

    public function log(){
        return view('/commons/head').view('/usuarios/login').view('/commons/footer');
    }

    public function registrar_usuario(){
        $db = \Config\Database::connect();
        //$visitanteModel = model('VisitanteModel');
        $data = [
            "correo_electronico" => $_POST['correo_electronico'],
            "nombre_usuario" => $_POST['nombre_usuario'],
            "contrasena" => $_POST['contrasena'],
            "perfil" => $_POST['perfil']
        ];
        $db->table('visitante')->insert($data);
        return view('/commons/head').view('/usuarios/login').view('/commons/footer');
    }

    public function ingresar(){

        $validation =  \Config\Services::validation();

            // Si el metodo es get
            if (strtolower($this->request->getMethod()) === 'get'){
                return view('/commons/head') .
                view('/usuarios/login') .
                view('/commons/footer');
            }
            
            // reglas
            $rules = [
                'correo_electronico' => 'required',
                'contrasena'=>'required',
                'perfil' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('/commons/head') .
                view('/usuarios/login') .
                view('/commons/footer');
            }
            else{
                //si pasa las reglas
                $correo_electronico = $_POST['correo_electronico'];
                $contrasena = $_POST['contrasena'];
                $perfil = $_POST['perfil'];

                //Segun el tipo de perfil buscaremos los datos requeridos
                switch ($perfil) {
                    // Si es administrador buscamos en la tabla de administrador
                    case 1:
                        $modelo = model('AdministradorModel');
                        $data['usuario']= $modelo->like('correo_electronico',$correo_electronico)
                        ->like('contrasena',$contrasena)
                        ->findAll();
                        break;
                // Si es vendedor buscamos en la tabla de vendedor
                    case 2:
                        $modelo = model('VendedorModel');
                        $data['usuario']= $modelo->like('correo_electronico',$correo_electronico)
                        ->like('contrasena',$contrasena)
                        ->findAll();
                        break;
                // Si es cliente buscamos en la tabla de visitante
                    case 3:
                        $modelo = model('VisitanteModel');
                        $data['usuario']= $modelo->like('correo_electronico',$correo_electronico)
                        ->like('contrasena',$contrasena)
                        ->findAll();
                        break;
                    
                }

                //iniciar sesion
                print_r($data['usuario']);
                if(count($data['usuario'])>0){
                    print "creo la sesión";
                    print $data['usuario'][0]->idUsuario;
                    $session = session();

                    $newdata = [
                        'idUsuario' => $data['usuario'][0]->idUsuario,
                        'nombreUsuario'  => $data['usuario'][0]->nombreUsuario,
                        'email'     => $data['usuario'][0]->email,
                        'logged_in' => true,
                    ];
                    
                    $session->set($newdata);

                }
                else{
                    return redirect('usuarios/login','refresh');
                }
            }
    }
}
