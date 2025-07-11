<?php
require('_inc/classes/Route.php');

Route::set('/', '/index');
Route::set('/login');
Route::set('/signup');
Route::set('/register-course');
Route::set('/register-event');
Route::set('/admin');
Route::set('/admin-create');
Route::set('/admin-update');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require Route::routeExists($uri);
