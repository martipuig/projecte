<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

Route::group(['middleware' => 'auth'], function () {

	Route::resource('categorias', 'categoriaController');
	Route::resource('categoriaEsps', 'categoria_espController');
	Route::resource('categoriaEsps', 'categoriaEspController');
	Route::resource('articles', 'articleController');
	Route::get('logout', 'Auth\AuthController@logout');
	Route::get('canvis', 'canvisController@obtenirCanvis');
});


Route::get('/ajax-subcat/{id}', 'articleController@ajax');
Route::post('/multidestroy', 'articleController@multidestroy');
Route::get('/destroy/{id}', 'articleController@destroy');


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


// Imatges
Route::get('list', 'PictureController@showPictureList');
Route::get('pic/{id}', 'PictureController@showPicture');
Route::get('resize/{id}', 'PictureController@showPictureResize');
Route::get('add', 'PictureController@addPicture');
Route::post('add', 'PictureController@savePicture');


//Ruta de index

Route::get('index', 'indexController@index');
Route::resource('index', 'indexController');
Route::get('buscador/{buscar}', 'indexController@buscador');

