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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::view('/', 'welcome');

Route::get('/hi', function () {
    return 'Hello World';
});

//add id pattern in RouteServiceProvider->boot()
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});//->where('id', '[0-9]+');


Route::get('user/{name?}', function ($name = 'John') {
    return $name;
})->where('name', '[A-Za-z]+');

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'User List';
    });
});

