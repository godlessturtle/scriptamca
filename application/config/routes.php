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
$route['default_controller'] = 'HomeController';
$route['404_override'] = 'HomeController/notFound';
$route['translate_uri_dashes'] = FALSE;



    $route['(:any)'] = 'HomeController/single/$1';
    $route['kategori/(:any)'] = 'HomeController/category/$1';
    $route['rastgele/script'] = 'HomeController/randomPost';
    $route['script/ara'] = 'HomeController/search';
    $route['kategori/(:any)/(:num)'] = 'HomeController/category/$1';


    $route['sitemap/sitemap.xml'] = 'HomeController/sitemap';


    $route['panel/main'] = 'AdminController';
    $route['panel/profile'] = 'AdminController/profile';
    $route['panel/update/password'] = 'AdminController/updatePassword';

/* Login */
    $route['panel/login']       = 'AdminLoginController/index';
    $route['panel/do/login']    = 'AdminLoginController/login';
    $route['panel/logout']      = 'AdminLoginController/logout';
/* /.Login */

/* Kategoriler */
    $route['panel/categories']              = 'AdminController/categories';
    $route['panel/categories/(:num)']       = 'AdminController/categories';
    $route['panel/create/category']         = 'AdminController/createCategory';
    $route['panel/edit/category/(:num)']    = 'AdminController/editCategoryPage/$1';
    $route['panel/update/category']         = 'AdminController/updateCategory';
    $route['panel/delete/cat/(:num)']       = 'AdminController/deleteCategory/$1';
/* /.Kategoriler */

/* Post */
    $route['panel/posts'] = 'AdminController/posts';
    $route['panel/new/post'] = 'AdminController/newPost';
    $route['panel/create/post'] = 'AdminController/createPost';
    $route['panel/edit/post/(:num)'] = 'AdminController/editPost/$1';
    $route['panel/update/post'] = 'AdminController/updatePost';
    $route['panel/delete/post/(:num)'] = 'AdminController/deletePost/$1';
/* /.Post */


/* Page */
    $route['panel/pages'] = 'AdminController/pages';
    $route['panel/delete/page/(:num)'] = 'AdminController/deletePage/$1';
    $route['panel/new/page'] = 'AdminController/newPage';
    $route['panel/create/page'] = 'AdminController/createPage';
    $route['panel/edit/page/(:num)'] = 'AdminController/editPage/$1';
    $route['panel/update/page'] = 'AdminController/updatePage';
/* /.Page */


/* Settings */
    $route['panel/settings'] = 'AdminController/settings';
    $route['panel/update/settings'] = 'AdminController/updateSettings';
/* /.Settings */


/* Menus */
    $route['panel/menus'] = 'AdminController/menus';
    $route['panel/create/menu'] = 'AdminController/createMenu';
    $route['panel/delete/menu/(:num)'] = 'AdminController/deleteMenu/$1';
    $route['panel/menuorder?(:any)'] = 'AdminController/menuorder';
/* Menus */


/* Modules */
    $route['panel/modules'] = 'AdminController/modules';
    $route['panel/moduleOrder?(:any)'] = 'AdminController/updateModuleOrders';
    $route['panel/create/module'] = 'AdminController/createModule';
    $route['panel/delete/module/(:num)'] = 'AdminController/deleteModule/$1';