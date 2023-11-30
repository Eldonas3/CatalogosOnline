<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/visitante/MostrarCatalogo','VisitanteController::consultarCatalogo');
$routes->post('/visitante/MostrarCatalogo','VisitanteController::consultarCatalogo');
$routes->get('/visitante/home_visitante','VisitanteController::mostrarCatalogos');

$routes->get('/usuarios/login','UsuariosController::log');
$routes->get('/usuarios/registro','UsuariosController::index');
$routes->post('/usuarios/registro','UsuariosController::registrar_usuario');
$routes->post('/usuarios/login','UsuariosController::ingresar');
//metodo para cerrar sesion
$routes->get('/usuarios/cerrar_sesion','UsuariosController::cerrar_sesion');

//rutas vendedor
$routes->get('/vendedor/crearCatalogo','VendedorController::crearCatalogo');