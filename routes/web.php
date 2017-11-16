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

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/', 'welcome');

//req/tom?a=b&c=d
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
    echo '****only'; var_dump($request->only(['a']));
    echo '****has:' . $request->has(['a', 'c']);
    echo '****filled:' . $request->filled('a'); 
});

Route::get('/hi', function () {
    return 'Hello World';
});

//add id pattern in RouteServiceProvider->boot()
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
})->name('profile');
//->where('id', '[0-9]+');


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

Route::get('home', function () {
    return response('return response : Hello World', 200)
           ->header('Content-Type', 'text/plain')
           ->cookie('cookie_name', 'cookie_value', 20);
});

Route::get('dashboard', function () {
    //return redirect('home');
    //return redirect()->route('profile', ['id' => 1]);
    //フラッシュデータを保存
    //return redirect('dashboard')->with('status', 'Profile updated!');
    
    //JSON
    return response()->json([
        'name' => 'Sally',
        'age' => '20'
    ]);

    //return response()->caps('hello');

    //ファイル表示
    //return response()->file($pathToFile, $headers);

    //download file
    //return response()->download($pathToFile, $name, $headers);
    //return response()->download($pathToFile)->deleteFileAfterSend(true);
});

Route::get('/greet', function () {
    //return view('greeting', ['name' => 'James']);
    //return view('greeting')->with('name', 'James');

    //AppServiceProvider->boot() 全ビュー間のデータ共有
    return view('greeting');
});


