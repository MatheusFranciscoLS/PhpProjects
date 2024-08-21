<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\ProdutosMiddleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//página inicial com carrossel de produtos
Route::get ('/',[HomeController::class,'index'])->name('home');

Route::get('/registro',[UserController::class,'showRegistroForm'])->name('usuarios.registro');

//Rota para processar o registro
Route::post('/registro',[UserController::class, 'registro'])->name('usuarios.controller');

Route::get('/login',[UserController::class,'showLoginForm'])->name('usuarios.login');

//Rota para processar o login
Route::post('/login',[UserController::class, 'login'])->name('usuarios.controller');

//Rota para a página interna
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');
//Rota do logout
Route::post('/logout', [UserController::class, 'logout'])->name('usuarios.logout');

Route::resource('produtos', ProdutoController::class)->middleware(ProdutosMiddleware::class)->except('show');

// visualização de um produto específico
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->middleware('auth')->name('produtos.show');

// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho/{produtoId}', [CarrinhoController::class, 'add'])->name('carrinho.add');
    Route::delete('/carrinho/{id}', [CarrinhoController::class, 'remove'])->name('carrinho.remove');
    Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizarCompra'])->name('carrinho.finalizarCompra');
});

