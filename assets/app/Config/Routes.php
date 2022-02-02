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
$routes->match(['get','post'],'/editarEventos/(:num)', 'Eventos::editarEventos');
$routes->match(['get','post'],'/listarEventosUser', 'Eventos::listarEventosUser');
$routes->match(['get','post'],'/cadastrarEventos', 'Eventos::cadastrarEventos');
$routes->match(['get','post'],'/alterarEventos', 'Eventos::alterarEventos');

$routes->match(['get','post'],'/editarUser/(:num)', 'Users::editarUser');
$routes->match(['get','post'],'/cadastrarUser', 'Users::cadastrarUser');
$routes->match(['get','post'],'/alterarUser', 'Users::alterarUser');

$routes->match(['get','post'],'/editarAtividades/(:num)', 'Atividades::editarAtividades');
$routes->match(['get','post'],'/alterarAtividades', 'Atividades::alterarAtividades');
$routes->match(['get','post'],'/cadastrarAtividades', 'Atividades::cadastrarAtividades');
$routes->match(['get','post'],'/listarAtividades', 'Atividades::listarAtividades');
$routes->match(['get','post'],'/atividades/(:num)', 'Atividades::index');

$routes->match(['get','post'],'/inscritos', 'Inscritos::index');
$routes->match(['get','post'],'/emitirCertificado', 'Inscritos::emitirCertificado');

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
