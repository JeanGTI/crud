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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autores','AutoresController@index');
Route::get('autores/novo','AutoresController@novo');
Route::get('autores/{autor}/editar','AutoresController@editar');
Route::post('autores/salvar','AutoresController@salvar');
Route::patch('autores/{autor}','AutoresController@atualizar');
Route::delete('autores/{autor}','AutoresController@deletar');

Route::get('editoras','EditorasController@index');
Route::get('editoras/novo','EditorasController@novo');
Route::get('editoras/{editara}/editar','EditorasController@editar');
Route::post('editoras/salvar','EditorasController@salvar');
Route::patch('editoras/{editara}','EditorasController@atualizar');
Route::delete('editoras/{editara}','EditorasController@deletar');

Route::get('generos','GenerosController@index');
Route::get('generos/novo','GenerosController@novo');
Route::get('generos/{genero}/editar','GenerosController@editar');
Route::post('generos/salvar','GenerosController@salvar');
Route::patch('generos/{genero}','GenerosController@atualizar');
Route::delete('generos/{genero}','GenerosController@deletar');

Route::get('livros','LivrosController@index');
Route::get('livros/novo','LivrosController@cadastrar');
Route::get('livros/{livro}/editar','LivrosController@editar');
Route::post('livros/salvar','LivrosController@salvar');
Route::patch('livros/{livro}','LivrosController@atualizar');
Route::delete('livros/{livro}','LivrosController@deletar');
