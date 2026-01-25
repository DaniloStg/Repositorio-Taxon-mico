<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Repositorio
$routes->get('Principal','Repositorio\RepoPrincipalController::HomeRepositorio');

// Calculadora
$routes->get('Calculadora','Calculadora\LogicaCalculadora::VerCalculadora');