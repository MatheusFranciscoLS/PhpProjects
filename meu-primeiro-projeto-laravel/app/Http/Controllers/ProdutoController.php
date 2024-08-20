<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos',compact('produtos'));
    }

    // Método para exibir o formulário de adicionar produto
    public function create()
    {
        return view('add_produto');
    }

    // Método para salvar um novo produto
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
        ]);

        // Criação do novo produto
        Produto::create($validatedData);

        // Redireciona para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('produtos')->with('success', 'Produto adicionado com sucesso!');
    }
}