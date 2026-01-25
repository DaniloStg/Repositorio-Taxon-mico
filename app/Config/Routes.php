<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Repositorio Home
$routes->get('principal','Repositorio\RepoPrincipalController::HomeRepositorio');

// Ficha
$routes->get('ficha','Repositorio\RepoPrincipalController::Ficha');

$routes->get('ficha2','Repositorio\RepoPrincipalController::FichaRedireccion');



// Calculadora
$routes->get('calculadora','Calculadora\LogicaCalculadora::VerCalculadora');