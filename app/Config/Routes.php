<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/en', 'Home::index');
$routes->post('/contact', 'Mail::SaveMessage');

$routes->get('/blog', 'Blog::home');
$routes->get('/blog-right-sidebar', 'Blog::right_sidebar');
$routes->get('/blog-left-sidebar', 'Blog::left_sidebar');
$routes->get('/blog-grid', 'Blog::home');
$routes->get('/blog-full-width', 'Blog::full_width');
$routes->get('/blog/post/(:any)', 'Blog::post/$1');
$routes->get('/blog/user/(:num)', 'Blog::user/$1');
$routes->get('/blog/categoria/(:any)', 'Blog::category/$1');
$routes->get('/blog/tag/(:any)', 'Blog::tag/$1');

$routes->get('/login', 'Users::login');
$routes->post('/login/post', 'Users::postlogin');
$routes->get('/forgot-password', 'Users::forgot_password'); //forgot_password
$routes->post('/forgot-password/post', 'Users::postforgot');
$routes->get('/create_user', 'Users::create_user');
$routes->get('/logout', 'Users::logout');

$routes->group('dashboard', ['namespace'	=>	'App\Controllers', 'filter' => 'auth'], function($routes){
	$routes->get('', 'Home::dashboard');
	$routes->get('profile', 'Users::profile');
	$routes->post('profile/post', 'Users::postprofile');
});

$routes->group('dashboard/mail', ['namespace'	=>	'App\Controllers', 'filter'	=>	'auth'], function($routes){
	$routes->get('(:num)',	'Mail::mail/$1');
});

$routes->group('dashboard/users', [ 'namespace'	=> 'App\Controllers', 'filter'	=> 'users'], function($routes){
	$routes->get('', 'Users::users');
	$routes->get('create', 'Users::userscreate');
	$routes->post('store', 'Users::usersstore');
	$routes->get('(:num)', 'Users::usersedit/$1');
	$routes->post('edit/(:num)', 'Users::usersupdate/$1');
	$routes->post('destroy/(:num)', 'Users::usersdestroy/$1');
});

$routes->group('dashboard/mantenimientos/mantenimiento', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Manten::mantenimiento');
	$routes->post('background', 'Manten::background');
	$routes->post('welcome', 'Manten::welcome');
	$routes->post('logo', 'Manten::logo');
});

$routes->group('dashboard/mantenimientos/clientes', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Clientes::index');
	$routes->get('create', 'Clientes::create');
	$routes->post('store', 'Clientes::store');
	$routes->get('(:num)', 'Clientes::edit/$1');
	$routes->post('edit/(:num)', 'Clientes::update/$1');
	$routes->post('destroy/(:num)', 'Clientes::destroy/$1');
});

$routes->group('dashboard/mantenimientos/trabajos_recientes', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Trabajos::index');
	$routes->get('create', 'Trabajos::create');
	$routes->post('store', 'Trabajos::store');
	$routes->get('(:num)', 'Trabajos::edit/$1');
	$routes->post('edit/(:num)', 'Trabajos::update/$1');
	$routes->post('destroy/(:num)', 'Trabajos::destroy/$1');
});

$routes->group('dashboard/blog/posts', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Blog::index');
	$routes->get('create', 'Blog::create');
	$routes->post('store', 'Blog::store');
	$routes->get('(:num)', 'Blog::edit/$1');
	$routes->post('edit/(:num)', 'Blog::update/$1');
	$routes->post('destroy/(:num)', 'Blog::destroy/$1');
});

$routes->group('dashboard/blog/categories', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Categories::index');
	$routes->get('create', 'Categories::create');
	$routes->post('store', 'Categories::store');
	$routes->get('(:num)', 'Categories::edit/$1');
	$routes->post('edit/(:num)', 'Categories::update/$1');
	$routes->post('destroy/(:num)', 'Categories::destroy/$1');
});

$routes->group('dashboard/blog/tags', [ 'namespace' => 'App\Controllers', 'filter'	=> 'auth'], function($routes){
	$routes->get('', 'Tags::index');
	$routes->get('create', 'Tags::create');
	$routes->post('store', 'Tags::store');
	$routes->get('(:num)', 'Tags::edit/$1');
	$routes->post('edit/(:num)', 'Tags::update/$1');
	$routes->post('destroy/(:num)', 'Tags::destroy/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
