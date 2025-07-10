<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('produtos', ProdutosController::class);
Route::resource('users', UserController::class);

Route::get('/', [siteController::class, 'index'])->name('site.index');
Route::get('/produto/{id}', [siteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [siteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addCarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removeCarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparCarrinho');
Route::post('/finalizar-pedido', [CarrinhoController::class, 'finalizarPedido'])->name('site.finalizarPedido');


Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/usuario/postagens', [DashboardController::class, 'minhasPostagens'])->name('usuario.postagens')->middleware('auth');
Route::get('/usuario/compras', [CarrinhoController::class, 'minhasCompras'])->name('usuario.compras')->middleware('auth');


