<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'form';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['inicial'] = 'form/inicial';
$route['inicial/(:any)'] = 'form/inicial/$1';
$route['checklist'] = 'form/checklist';
$route['concluido'] = 'form/concluido';
$route['approval/confirm'] = 'checklist/approval_confirm';
$route['approval/(:any)'] = 'checklist/approval/$1';

/* Rotes below are from admin */
$route['login'] = 'users/login';
$route['dashboard'] = 'checklist';
$route['checklists'] = 'checklist';
$route['checklists/reenviar'] = 'checklist/resend_approval';
$route['checklists/comprovantes'] = 'checklist/load_files';

$route['clientes'] = 'clients';
    $route['clientes/cadastrar'] = 'clients/insert';
    $route['clientes/salvar'] = 'clients/save';
    $route['clientes/editar/(:any)'] = 'clients/get/$1';
    $route['clientes/excluir'] = 'clients/delete';


$route['lojas/(:num)'] = 'stores/index/$1';
    $route['lojas/(:num)/cadastrar'] = 'stores/insert/$1';
    $route['lojas/(:num)/salvar'] = 'stores/save/$1';
    $route['lojas/(:num)/editar/(:num)'] = 'stores/get/$1/$2';
    $route['lojas/excluir'] = 'stores/delete';
    
    
$route['equipamentos/(:num)'] = 'facilities/index/$1';
    $route['equipamentos/(:num)/cadastrar'] = 'facilities/insert/$1';
    $route['equipamentos/(:num)/salvar'] = 'facilities/save/$1';
    $route['equipamentos/(:any)/editar/(:num)'] = 'facilities/get/$1/$2';
    $route['equipamentos/excluir'] = 'facilities/delete';


$route['log'] = 'log/listar';
$route['log/(:any)'] = 'log/listar/$1';