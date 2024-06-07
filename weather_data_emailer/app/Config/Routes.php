<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'User::login');

 
$routes->match(['get', 'post'], 'signup', 'User::register');
$routes->match(['get', 'post'], 'login', 'User::login');
 
// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

 
$routes->get('logout', 'User::logout');




 

$routes->get('/', 'Home::index');

 
$routes->post('getWeather', 'Home::getWeather');


$routes->get('index', 'Weather::index',['filter' => 'auth']);

$routes->get('history', 'Weather::viewHistory',['filter' => 'auth']);

 
$routes->post('getDetails', 'Weather::getDetails',['filter' => 'auth']);

 
 
 
 
 
 


