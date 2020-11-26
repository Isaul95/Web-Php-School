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
$route['default_controller'] = 'auth'; // nOMBRE DEL CONTROLLER K CARGA COMO DEFAULT (lOGIN)
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// *****************************  DEFINICION DE LA RUTA ********************************************
// 1.-  mantenimiento  ===> Es el nombre d la carpeta donde se encuentran los controller
// 2.-  RegistroPagos  ===> Es el nombre del controller
// 3.-  insertar       ===> Es el nombre del metodo/function k hace la accion deseada

// *****************************  RUTAS PARA CRUD ********************************************
$route['insertar']      = 'mantenimiento/RegistroPagos/insertar';
$route['listar']        = 'mantenimiento/RegistroPagos/listar';
$route['eliminar']      = 'mantenimiento/RegistroPagos/eliminar';
$route['edit']          = 'mantenimiento/RegistroPagos/edit';
$route['update']        = 'mantenimiento/RegistroPagos/update';

// ========== Finanzas  ========>>    Formato de registro de pago  =============
$route['insertarPagos']      = 'Finanzas/FormatoRegistroPago/insertarPagos';
$route['listarPagos']        = 'Finanzas/FormatoRegistroPago/listarPagos';
$route['eliminarPagos']      = 'Finanzas/FormatoRegistroPago/eliminarPagos';
$route['editPagos']          = 'Finanzas/FormatoRegistroPago/editPagos';
$route['updatePagos']        = 'Finanzas/FormatoRegistroPago/updatePagos';

// // ==========Alta Baucher ========>>    Formato de registro de pago  =============
// $route['insertarPagos']      = 'Finanzas/FormatoRegistroPago/insertarPagos';
