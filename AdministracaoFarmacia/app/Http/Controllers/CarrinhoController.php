<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    // Mostrar o carrinho
    public function index()
    {
        $itens = Auth::user()->carrinho()->with('produto')->get(); // Carrega os itens do carrinho com informações do produto

        // Calcular o valor total da compra
        $valorTotal = $itens->reduce(function ($carry, $item) {
            return $carry + ($item->quantidade * $item->produto->preco);
        }, 0);

        return view('carrinho.index', compact('itens', 'valorTotal'));
    }

    // Adicionar um item ao carrinho
    public function add(Request $request, $produtoId)
    {
        $usuarioId = Auth::id();
        $quantidade = $request->input('quantidade', 1);

        $produto = Produto::findOrFail($produtoId);

        $itemExistente = Carrinho::where('id_user', $usuarioId)
            ->where('id_produto', $produtoId)
            ->first();

        if ($itemExistente) {
            $itemExistente->quantidade += $quantidade;
            $itemExistente->save();
        } else {
            Carrinho::create([
                'id_user' => $usuarioId,
                'id_produto' => $produtoId,
                'quantidade' => $quantidade,
            ]);
        }

        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    // Remover um item do carrinho
    public function remove($id)
    {
        $item = Carrinho::findOrFail($id);
        $item->delete();

        return redirect()->route('carrinho.index')->with('success', 'Item removido do carrinho com sucesso!');
    }

    // Finalizar a compra
    public function finalizarCompra(Request $request)
    {
        $usuarioId = Auth::id();

        // Limpar o carrinho do usuário
        Carrinho::where('id_user', $usuarioId)->delete();

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('carrinho.index')->with('success', 'Compra finalizada com sucesso! O carrinho foi limpo.');
    }
}
    