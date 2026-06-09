<?php

use App\Http\Controllers\NivelAcessoController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Rotas Nível de acesso
Route::get('/nivel-acesso/cadastro',[NivelAcessoController::class, 'cadastro'])
->name('nivel-acesso.cadastro');

Route::post('/nivel-acesso/salvar',[NivelAcessoController::class, 'add'])
->name('nivel-acesso.salvar');

Route::get('/nivel-acesso/listar',[NivelAcessoController::class, 'listar'])
->name('nivel-acesso.listar');

Route::delete('/nivel-acesso/deletar/{id}',[NivelAcessoController::class, 'deletar'])
->name('nivel-acesso.deletar');

Route::get('/nivel-acesso/atualizar/{id}',[NivelAcessoController::class, 'atualizar'])
->name('nivel-acesso.atualizar');

Route::put('/nivel-acesso/update/{id}',[NivelAcessoController::class, 'update'])
->name('nivel-acesso.update');

// Rotas do usuário
Route::get('/usuarios/cadastro',[UsuariosController::class, 'cadastro'])
->name('nivel-acesso.update');

Route::post('/usuario/salvar',[UsuariosController::class, 'add'])
->name('usuarios.salvar');

Route::get('/usuarios/listar',[UsuariosController::class, 'listar'])
->name('usuarios.listar');

Route::delete('/usuarioas/deletar/{id}',[UsuariosController::class, 'deletar'])
->name('usuarios.deletar');

Route::get('/usuarios/atualizar/{id}',[UsuariosController::class, 'atualizar'])
->name('usuarios.atualizar');

Route::get('/usuarios/update/{id}',[UsuariosController::class, 'update'])
->name('usuarios.update');