<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Route;
Route::add('/', 'Front\TaskController@index');
Route::add('create/task', 'Front\TaskController@create',['get','post']);
Route::add('update/task/{id}', 'Front\TaskController@update',['get', 'post']);
Route::add('delete/task/{id}', 'Front\TaskController@delete');

$uri=trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if($uri === ''){
    $uri='/';
}

Route::dispatch($uri);