<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Repositorio Home
$routes->get('principal','Repositorio\RepoPrincipalController::HomeRepositorio');

// Ficha
// PROPUESTA 1
$routes->get('ficha','Repositorio\RepoPrincipalController::Ficha');
// PROPUESTA 2
$routes->get('ficha2','Repositorio\RepoPrincipalController::Fichatarjeta');
// PROPUESTA 3
$routes->get('ficha3','Repositorio\RepoPrincipalController::FichaModal');


// Calculadora
$routes->get('calculadora','Calculadora\LogicaCalculadora::VerCalculadora');