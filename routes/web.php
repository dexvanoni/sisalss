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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('sair', 'Auth\LoginController@logout')->name('sair');


// Rotas de CRUD livre acesso a todos
Route::resource('reserva', ReservaController::class)->middleware('auth');

// Rotas de CRUD protegidas - Somente diretores!
Route::group(['middleware' => 'diretoria'], function() {
    Route::resource('carteira', CarteiraController::class)->middleware('auth');
    Route::resource('cautela', CautelaController::class)->middleware('auth');
    Route::resource('diretoria', DiretoriaController::class)->middleware('auth');
    Route::resource('espaco', EspacoController::class)->middleware('auth');
    Route::resource('livro', LivroController::class)->middleware('auth');
    Route::resource('material', MaterialController::class)->middleware('auth');
    Route::resource('mensalidade', MensalidadeController::class)->middleware('auth');
    Route::resource('piscina', PiscinaController::class)->middleware('auth');
    Route::resource('prestador', PrestadorController::class)->middleware('auth');
    Route::resource('servico', ServicoController::class)->middleware('auth');
});