<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

require_once 'routes'.DIRECTORY_SEPARATOR.'office'.DIRECTORY_SEPARATOR.'routesOffice.php';

require_once 'routes'.DIRECTORY_SEPARATOR.'store'.DIRECTORY_SEPARATOR.'routesStore.php';
