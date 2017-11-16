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
use Illuminate\Http\Request;

/*
Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'welcome');
*/

Route::get('/req/{name?}', function (Request $request) {
    echo 'path:' . $request->path();
    echo '****url:' . $request->url();
    echo '****fullUrl:' . $request->fullUrl();
    echo '****method:' . $request->method();
    echo '****all:'; var_dump($request->all());
    echo '****input:' . $request->input('name', 'Sally');
    echo '****query:' . $request->query('name', 'Helen');
    echo '****query():'; var_dump($request->query());
    echo '****name:' . $request->name;
});

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

Route::get('photos/popular', 'PhotoController@method');
Route::resource('photos', 'PhotoController');

