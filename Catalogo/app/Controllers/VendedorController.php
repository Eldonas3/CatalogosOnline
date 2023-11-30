<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VendedorController extends BaseController
{
    public function index()
    {
        return view('commons/head').view('commons/menu').view('vendedor/homeVendedor').view('commons/footer');
    }

    public function crearCatalogo(){
        return view('commons/head').view('commons/menu').view('vendedor/crearCatalogo').view('commons/footer');
    }
}
