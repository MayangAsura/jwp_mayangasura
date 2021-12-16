<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'app';
$route['auth'] = 'auth';
$route['register'] = 'auth/registration';
$route[''] = 'app';
$route['home'] = 'app';

$route['forgotpassword'] = 'auth/forgot_password';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
