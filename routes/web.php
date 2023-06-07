<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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
    $latestPost = Post::latest()->first();
        
    if ($latestPost) {
        $titulo = $latestPost->titulo;
        $mensaje = $latestPost->mensaje;
    } else {
        $titulo = 'Titulo';
        $mensaje = 'Este es mi mensaje';
    }

    return view('welcome', compact('titulo', 'mensaje'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/registro-tenant', 'LandingController@crearTenant')->name('registro.tenant.post');
