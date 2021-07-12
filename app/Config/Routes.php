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
// $routes->setDefaultController('Home');
$routes->setDefaultController('Users');
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
// $routes->get('/', 'Home::index');
$routes->match(['get','post'],'/', 'Users::index');
$routes->match(['get','post'],'/registro', 'Users::register');
$routes->match(['get','post'],'/recuperacao', 'Users::recuperacaoSenha');
$routes->match(['get','post'],'/recuperacao/(:any)', 'Users::novasenha/$1');
$routes->get('logout', 'Users::logout');

$routes->match(['get','post'],'/eventos', 'Eventos::index');
$routes->match(['get','post'],'/editeventos/(:num)', 'Eventos::editeventos');
$routes->match(['get','post'],'/listareventos', 'Eventos::listar');
$routes->match(['get','post'],'/cadevento', 'Eventos::cadeventos');
$routes->match(['get','post'],'/alterareventos', 'Eventos::alterareventos');

$routes->match(['get','post'],'/editaruser/(:num)', 'Users::edituser');
$routes->match(['get','post'],'/caduser', 'Users::caduser');
$routes->match(['get','post'],'/excluiruser', 'Users::excluiruser');

$routes->match(['get','post'],'/editativ/(:num)', 'Atividades::editativ');
$routes->match(['get','post'],'/excluirativ', 'Atividades::excluirativ');
$routes->match(['get','post'],'/cadativ', 'Atividades::cadativ');
$routes->match(['get','post'],'/listarativ', 'Atividades::listativ');
$routes->match(['get','post'],'/atividades/(:num)', 'Atividades::index');

/* AJAX */
$routes->match(['get','post'],'/cidade', 'AjaxCidade::getCidades');
$routes->match(['get','post'],'/estado', 'AjaxEstado::getEstados');

// $routes->match(['get','post'],'/concluirAtividade', 'Dashboard::concluirAtividade');
$routes->match(['get','post'],'/verificarConclusao/(:num)', 'Atividades::verificarConclusao');

$routes->get('/certificadoVizualizacao/(:num)', 'PdfController::index');
$routes->get('/certificado/(:num)', 'PdfController::gerarCertificado');

$routes->match(['get','post'],'/chats', 'Chat::index');




/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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
