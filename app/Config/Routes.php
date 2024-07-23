<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Home::index');

 //Login routes defined here
 $routes->POST('/login/check', 'Home::loginAuth');

// logout 
$routes->get('logout', 'Home::logout');

// forgot password routes defined here
$routes->get('forgot_password', 'SendMail::forgot_password');
// send mail
$routes->post('send_email', 'SendMail::send_email_link');

// Reset Password form show
$routes->get('reset_password/(:num)', 'ResetPassword::reset_password/$1');

// Update passwor functionality route
$routes->post('update_password', 'ResetPassword::update_password');

// Route for 
$routes->get('dashboard', 'DashBoard::dashboard');

// Equipments
$routes->get('equipments', 'Home::equipments');
$routes->POST('equipments/add_equipments', 'Home::add_equipments');
$routes->get('view_equipments', 'Home::view_equipments');

// Properties
$routes->get('property', 'Property::states');
$routes->POST('property/add_property', 'Property::add_property');

// States and cities 
$routes->POST('cities', 'Property::cities');



