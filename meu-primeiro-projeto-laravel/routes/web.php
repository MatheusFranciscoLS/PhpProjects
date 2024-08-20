<?php
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Rota para a página inicial
Route::get('/', function () {
    return view('home');
})->name('home');

// Rota para a página de produtos, usando o controlador
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');

// Rota para a página de contato
Route::get('/contato', function () {
    return view('contato');
})->name('contato');

// Rota para exibir o formulário de adicionar produto
Route::get('/produtos/add', function () {
    return view('add_produto');
});

// Rota para processar o envio do formulário e adicionar o produto
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');