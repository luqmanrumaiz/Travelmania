<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'home/register';
$route['login'] = 'home/login';
$route['home'] = 'home/home';

$route['post/(:num)'] = 'home/post/$1';
$route['post/delete/(:num)'] = 'home/post/delete_delete/$1';

$route['comment/comment/(:num)'] = 'home/comment/comment_get/$1';
