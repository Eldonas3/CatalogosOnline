<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/visitante/MostrarCatalogo','VisitanteController::consultarCatalogo');
$routes->get('/visitante','VisitanteController::mostrarProductos');

$routes->get('/usuarios/login','UsuariosController::log');
$routes->get('/usuarios/registro','UsuariosController::index');
$routes->post('/usuarios/registro','UsuariosController::registrar_usuario');
$routes->post('/usuarios/login','UsuariosController::ingresar');
// $routes->post('/usuarios/registro','UsuariosController::insertar');

$routes->get('/visitante/Prueba','VisitanteController::consultarCatalogo');
