<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function add(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'quantidade' => 'required|numeric|min:1',
        ]);

        Carrinho::create([
            'id_produto' => $produto->id,
            'id_user' => Auth::id(),
            'quantidade' => $dados['quantidade'],
        ]);

        return redirect()->back()->with('sucess', 'Produto adicionado ao Carrinho.');
    }
}
