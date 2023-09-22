<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/students', 'StudentController::students');
$routes->post('/save', 'StudentController::save');
$routes->get('/delete/(:any)', 'StudentController::delete/$1');
$routes->get('/edit/(:any)', 'StudentController::edit/$1');
$routes->post('/sectionSave', 'StudentController::createSection');
$routes->get('/sectionDelete/(:any)', 'StudentController::deleteSection/$1');