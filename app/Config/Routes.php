<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->get('signup', 'Signup::index');
$routes->get('forgot-password', 'ForgotPassword::index');
$routes->get('reset-password', 'ResetPassword::index');
$routes->post('signup/store', 'Signup::store');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('logout', 'Login::logout');
$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');
$routes->get('tasks', 'Tasks::index');
$routes->post('tasks/store', 'Tasks::store');
$routes->get('tasks/delete/(:num)', 'Tasks::delete/$1');
$routes->get('tasks/show/(:num)', 'Tasks::show/$1');
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->get('users', 'Users::index');
$routes->get('users/new', 'Users::create');
$routes->post('users/store', 'Users::store');
$routes->get('users/show/(:num)', 'Users::show/$1');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');
$routes->get('users/delete/(:num)', 'Users::delete/$1');
$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');
$routes->get('lang/(:any)', 'Language::set/$1');
$routes->get('forgot-password', 'Login::forgotPassword');
$routes->post('login/sendResetLink', 'Login::sendResetLink');
$routes->get('reset-password/(:any)', 'Login::resetPassword/$1');
$routes->post('login/updatePassword', 'Login::updatePassword');