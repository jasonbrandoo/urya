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

$route['users/update'] = 'Controller_user/update';
$route['users/edit/(:any)'] = 'Controller_user/edit/$1';
$route['users/messages/(:any)'] = 'Controller_user/messages/$1';
$route['users/upload'] = 'Controller_user/upload';
$route['users/profile/(:any)'] = 'Controller_user/profile/$1';
$route['admin/deletecomment/(:any)'] = 'Controller_admin/delete_comment/$1';
$route['admin/deleteuser/(:any)'] = 'Controller_admin/delete_user/$1';
$route['admin/logout'] = 'Controller_admin/logout';
$route['admin/deletenews/(:any)'] = 'Controller_admin/delete_news/$1';
$route['admin/delete/(:any)'] = 'Controller_admin/delete/$1';
$route['admin/create_news'] = 'Controller_admin/create_news';
$route['admin/create'] = 'Controller_admin/create';
$route['admin'] = 'Controller_admin/index';
$route['admin/login'] = 'Controller_admin/login';
$route['users/logout'] = 'Controller_user/logout';
$route['users/login'] = 'Controller_user/login';
$route['users/register'] = 'Controller_user/register';
$route['categories'] = 'Controller_categories/index';
$route['categories/news/(:any)'] = 'Controller_categories/posts/$1';
$route['categories/create'] = 'Controller_categories/create';
$route['edit/(:any)'] = 'Controller_news/edit/$1';
$route['news/delete/(:any)'] = 'Controller_news/delete/$1';
$route['comment/create/(:any)'] = 'Controller_comments/create/$1';
$route['news/create'] = 'Controller_news/create';
$route['news/update'] = 'Controller_news/update';
$route['news/view/(:any)'] = 'Controller_news/view/$1';
$route['news/(:num)'] = 'Controller_news/index';
$route['news'] = 'Controller_news';
$route['(:any)'] = 'Pages/view/$1';
$route['default_controller'] = 'Pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
